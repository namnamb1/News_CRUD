<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPost;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('post.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'create_by' => Auth::user()->id,
        ]);

        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('public/images/', $newFileName);
            $post->image = str_replace('public', '', $imagePath);
        }
        $post->save();

        Post::find($post->id)->category()->attach($request->category);

        return redirect('posts')->with(['message' => 'Thêm bài viết thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('category')->find($id);
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->fill([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('public/images/', $newFileName);
            $post->image = str_replace('public', '', $imagePath);
        }
        $post->save();

        Post::find($id)->category()->sync($request->category);

        return redirect('/posts')->with(['message' => 'Cập nhật bài viết thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->hasCategory()->delete();
        Post::findOrFail($id)->delete();
        return redirect()->back()->with(['message' => 'Delete Success']);
    }

    public function homePage(Request $request)
    {
        $keyword = $request->keyword;
        $start_date = $request->date;
        $end_date = $request->end_date;
        $category = $request->category;

        $posts = new Post();

        if ($keyword) {
            $posts = $posts->where('title', 'like', "%" . $keyword . "%");
        }

        if ($request->author) {
            $posts = $posts->where('create_by', $request->author);
        }

        if ($start_date) {
            $start_date = date('Y-m-d', strtotime($start_date));
            $posts = $posts->where('posts.created_at', '>=', $start_date);
        }

        if ($end_date) {
            $end_date = date('Y-m-d', strtotime($end_date));
            $posts = $posts->where('posts.created_at', '<=', $end_date);
        }

        if ($category) {
            $posts = $posts->join('category_posts', 'posts.id', '=', 'category_posts.post_id')
                ->join('category', 'category_posts.category_id', '=', 'category.id')->where('category_posts.category_id', $category);
        }

        $posts = $posts->orderBy('posts.id', 'desc')->paginate(20);

        $author = User::all();
        $categories = Category::all();

        return view('post.home', compact('posts', 'author', 'categories'));
    }

    public function chartData(Request $request)
    {
        $time = $request->time ?? date("Y");
        $catePost = $this->categoryPost();

        $year = Post::select(DB::raw('Year(created_at) as year'))
            ->groupBy(DB::raw("Year(created_at)"))
            ->pluck('year');

        $arrayMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            array_push($arrayMonth, $i);
        }
        $month = Post::select(DB::raw('Month(created_at) as month'));
        $post = Post::select(DB::raw('COUNT(*) as count'));
        $post = $post->whereYear('created_at', $time)
            ->whereIn(DB::raw('MONTH(created_at)'), $arrayMonth)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $month = $month->whereYear('created_at', $time)
            ->whereIn(DB::raw('MONTH(created_at)'), $arrayMonth)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($month as $index => $mon) {
            if (!empty($post)) {
                if (empty($post[$index])) {
                    $post[$index] = 0;
                }
                $data[$mon - 1] = $post[$index];
            }
        } // end chart year

        $lastMonth = Post::query()
            ->groupByRaw('DATE_FORMAT(created_at,\'%m\')')
            ->selectRaw('DATE_FORMAT(created_at,\'%m\') as date')
            ->where("created_at", ">", Carbon::now()->subMonths(5)) // lấy ra 6 tháng gần nhất
            ->pluck('date');

        $postChartMonth = Post::select(DB::raw('COUNT(*) as count'),);
        $postChartMonth = $postChartMonth->whereYear('created_at', date('Y'))
            ->whereIn(DB::raw('MONTH(created_at)'), $lastMonth)
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        

        return view('post.chart', compact('data', 'year', 'catePost', 'time', 'lastMonth', 'postChartMonth'));
    }

    public function categoryPost()
    {
        $post = Post::select(DB::raw('COUNT(*) as count'), 'category.name as name_cate')
            ->join('category_posts', 'posts.id', '=', 'category_posts.post_id')
            ->join('category', 'category_posts.category_id', '=', 'category.id')
            ->groupBy('category_posts.category_id')
            ->pluck('count', 'name_cate');

        return $post;
    }
}
