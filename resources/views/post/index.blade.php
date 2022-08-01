@extends('layout')
@section('main-content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Posts</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="margin-bottom:20px !important">
                <div class="input-group">
                    <input type="search" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $val)
                    <tr>
                        <td>{{ $val->id }}</td>
                        <td>{{ $val->title }}</td>
                        <td>{{ $val->content }}</td>
                        <td></td>
                        <td>
                            <a class="btn btn-primary" href="{{ asset('posts/'.$val->id.'/edit') }}">Edit</a>
                            <form action="{{ route('posts.destroy',$val->id) }}" method="post">
                                @csrf
                                @method('Delete')   
                                <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Do you really want to delete?')" />
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection