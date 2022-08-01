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
                                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Tiêu đề</label>
                                            <input type="text" id="simpleinput" class="form-control" name="title">
                                        </div>

                                        <div class="row g-2">
                                            <div class="mb-3 col-md-4">
                                                <label for="inputState" class="form-label">Category</label>
                                                <select id="inputState" class="form-select">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputZip" class="form-label">Ảnh đại diện</label>
                                                <input type="file" class="form-control" id="inputZip" name="image">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Nội dung</label>
                                            <textarea class="form-control" id="example-textarea" rows="5" name="content"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Tạo mới</button>

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