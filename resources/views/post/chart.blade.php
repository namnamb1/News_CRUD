@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-md-8 blog-main">
        <form action="{{ route('nam.db') }}" method="GET" class="row" style="margin-bottom:20px !important">
            <div class="col-md-2">
                <select name="time" class="form-select  mb-3">
                    <option value="">Chọn năm</option>
                    @if(isset($year))
                    @foreach($year as $val)
                    <option @if($time == $val) selected @endif value="{{ $val }}"> {{ $val }} </option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Chọn năm</button>
            </div>
        </form>
        <div class="p-3">
            <canvas id="myChart" style="height: 300px; display: block; box-sizing: border-box;"></canvas>
        </div>
        <div class="p-3" style="max-width: 500px; ">
            <h3>Số lượng bài viết theo danh mục</h3>
            <canvas id="chartCate"></canvas>
        </div>

        <div class="p-3" style="max-width: 500px; ">
            <h3>Số lượng bài viết 6 tháng gần nhất</h3>
            <canvas id="chartMonth"></canvas>
        </div>
    </div>
    @endsection