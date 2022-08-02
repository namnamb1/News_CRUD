@extends('layout')
@section('main-content')
<div class="container-fluid">
    <div class="card-body">
        <div class="row mb-2">
            @foreach($posts as $val)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">
                            @foreach($val->category as $cate)
                                {{ $cate->name }}
                            @endforeach 
                        </strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="{{ route('posts.show', $val->id) }}">{{ $val->title }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $val->created_at }} by {{ $val->author->name }}</div>
                        <p class="card-text mb-auto"></p>
                        <a href="{{ route('posts.show', $val->id) }}">Xem chi tiết</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{asset('storage/' . $val->image)}}" data-holder-rendered="true">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection