@extends('layout')
@section('main-content')
<div class="row">
<div class="col-md-8 blog-main">
          <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post->created_at }} Tác giả {{ $post->author->name}}</a></p>
            <p class="blog-post-meta">{!! $post->content !!}</p>
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{ asset('/')}}">Quay lại</a>
          </nav>

        </div>
</div>
@endsection