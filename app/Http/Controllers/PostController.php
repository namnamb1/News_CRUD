<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryPost;
use App\Post;
use App\User;
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
        $posts = Post::all();

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
    public function store(Request $request)
    {

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'create_by' => Auth::user()->id,
        ]);
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('public/images/', $newFileName);
            $post->image = str_replace('public', '', $imagePath);
        }
        $post->save();

        Post::find($post->id)->category()->attach($request->category);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

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
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->fill([
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

        Post::find($id)->category()->sync($request->category);

        return redirect('/posts');
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
        $arrayMonth = [];
        for($i=1;$i <=12; $i++){
            array_push($arrayMonth, $i);
        }
        $keyword = $request->keyword;
        $start_date = $request->date;
        $end_date = $request->end_date;
        $category = $request->category;

        $posts = Post::where('title', 'like', "%" . $keyword . "%");
        
        if ($request->author) {
            $posts->where('create_by', $request->author);
        }

        if ($start_date) {
            $start_date = date('Y-m-d', strtotime($start_date));
            $posts = $posts->where('created_at', '>=', $start_date);
        }
        if ($end_date) {
            $end_date = date('Y-m-d', strtotime($end_date));
            $posts = $posts->where('created_at', '<=', $end_date);
        }
        if ($category) {
            $posts = Post::join('category_posts', 'posts.id', '=', 'category_posts.post_id')
                ->join('category', 'category_posts.category_id', '=', 'category.id')->where('category_posts.category_id', $category);
        }

        $posts = $posts->get();

        $month = Post::select(DB::raw('Month(updated_at) as month'));
        $post = Post::select(DB::raw('COUNT(*) as count'));

        $post = $post->whereIn(DB::raw('MONTH(updated_at)'), $arrayMonth)
            ->groupBy(DB::raw("Month(updated_at)"))
            ->pluck('count');

        $month = $month->whereIn(DB::raw('MONTH(updated_at)'), $arrayMonth)
            ->groupBy(DB::raw("Month(updated_at)"))
            ->pluck('month');
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($month as $index => $mon) {
            if (!empty($post)) {
                if (empty($post[$index])) {
                    $post[$index] = 0;
                }
                $data[$mon - 1] = $post[$index];
            }
        }

        $author = User::all();
        $categories = Category::all();

        return view('post.home', compact('posts', 'author', 'categories', 'data'));
    }
}
