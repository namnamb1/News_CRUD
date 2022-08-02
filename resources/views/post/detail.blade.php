@extends('layout')
@section('main-content')
<div class="row">
<div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Firehose
          </h3>

          <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
                <p class="blog-post-meta">{{ $post->created_at }} <a href="#">{{ $post->author->name}}</a></p>
            <p class="blog-post-meta">{{ $post->content }}</p>
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{ asset('/')}}">Quay lại</a>
          </nav>

        </div>
</div>
@endsection