@extends('layout')
@section('main-content')
<div class="navbar-">
    <div class="app-search dropdown d-none d-lg-block">
        <form class="row" style="margin-bottom:20px !important">
            <div class="mb-3 col-md-2">
                <input type="search" name="keyword" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
            </div>
            <div class="mb-3 col-md-2">
                <select name="author" class="form-select  mb-3">
                    <option value="">Tác giả</option>
                    @if(isset($author))
                    @foreach($author as $val)
                    <option value="{{ $val->id }}"> {{ $val->name }} </option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <select name="category" class="form-select  mb-3">
                    <option value="">Danh mục</option>
                    @if(isset($categories))
                    @foreach($categories as $val)
                    <option value="{{ $val->id }}"> {{ $val->name }} </option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <!-- <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> -->
                <input type="text" id="timeCheckIn" class="form-control" name="date" placeholder="Chọn ngày bắt đầu" autocomplete="off">
                <!-- </div> -->
            </div>
            <div class="mb-3 col-md-2">
                <input type="text" id="timeCheckOut" class="form-control" name="end_date" placeholder="Chọn ngày kết thúc" autocomplete="off">
            </div>
            <div class="mb-3 col-md-4">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>

        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
            <!-- item-->
            <div class="dropdown-header noti-title">
                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
            </div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-notes font-16 me-1"></i>
                <span>Analytics Report</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-life-ring font-16 me-1"></i>
                <span>How can I help you?</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="uil-cog font-16 me-1"></i>
                <span>User profile settings</span>
            </a>

            <!-- item-->
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
            </div>

            <div class="notification-list">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="d-flex">
                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                        <div class="w-100">
                            <h5 class="m-0 font-14">Erwin Brown</h5>
                            <span class="font-12 mb-0">UI Designer</span>
                        </div>
                    </div>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <div class="d-flex">
                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                        <div class="w-100">
                            <h5 class="m-0 font-14">Jacob Deo</h5>
                            <span class="font-12 mb-0">Developer</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
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
                            {{ $val->name }}
                        </strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="{{ route('posts.show', $val->post_id ?? $val->id) }}">{{ $val->title }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $val->created_at }} by {{ $val->author->name }}</div>
                        <p class="card-text mb-auto"></p>
                        <a href="{{ route('posts.show',  $val->post_id ?? $val->id) }}">Xem chi tiết</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="{{asset('storage/' . $val->image)}}" data-holder-rendered="true">
                </div>
            </div>
            @endforeach
        </div>
        {{ $posts->appends(request()->query())->links() }}
    </div>

</div>

@endsection