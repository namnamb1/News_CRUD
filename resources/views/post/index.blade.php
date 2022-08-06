@extends('layout')
@section('main-content')
<div class="card-body">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách bài viết</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiều đề</th>
                        <th>Mô tả</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $val)
                    <tr>
                        <td>{{ $val->id }}</td>
                        <td>{{ $val->title }}</td>
                        <td>{{ $val->short_description }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ asset('posts/'.$val->id.'/edit') }}">Edit</a>
                            <form action="{{ route('posts.destroy',$val->id) }}" method="post">
                                @csrf
                                @method('Delete')
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Xóa bài viết')" />
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $posts->appends(request()->query())->links() }}

        </div>
    </div>
</div>
@endsection