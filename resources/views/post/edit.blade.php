@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="header-title">Thêm bài viết</h4>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Tiêu đề</label>
                                            <input type="text" id="simpleinput" class="form-control" name="title" value="{{$post->title}}">
                                            @error('title')
                                            <span class="font-italic text-danger ">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Mô tả</label>
                                            <textarea class="form-control " rows="5" name="short_description">{{ $post->short_description }}</textarea>
                                        </div>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-4">
                                                <label for="simpleinput" class="form-label">Danh mục</label>
                                                @foreach($categories as $category)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="category[]" @foreach($post->category as $checked) @if($checked->id == $category->id) checked @endif @endforeach>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{ $category->name }}
                                                    </label>
                                                </div>
                                                @endforeach
                                                @error('category')
                                                <span class="font-italic text-danger ">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputZip" class="form-label">Ảnh đại diện</label>
                                                <input type="file" class="form-control" id="inputZip" name="image">
                                                @if($post->image)
                                                <div class="post-image-thumb thumb-cover">
                                                    <img  alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{asset('storage/' . $post->image)}}" data-holder-rendered="true">
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Nội dung</label>
                                            <textarea class="text" id="text" rows="5" name="content">{!! $post->content !!}</textarea>
                                            @error('content')
                                            <span class="font-italic text-danger ">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Sửa bài viết</button>

                                    </form>
                                </div> <!-- end col -->

                            </div>
                            <!-- end row-->
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>
@endsection