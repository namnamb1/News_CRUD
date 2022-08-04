@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-md-8 blog-main">
        <form action="{{ route('nam.db') }}" method="GET" class="row" style="margin-bottom:20px !important">
            <div class="mb-3 col-md-2">
                <select name="time" class="form-select  mb-3">
                    <option value="">Chọn năm</option>
                    @if(isset($year))
                    @foreach($year as $val)
                    <option @if($time == $val) selected @endif value="{{ $val }}"> {{ $val }} </option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3 col-md-4">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
        <canvas id="myChart" style="height: 300px; display: block; box-sizing: border-box;"></canvas>
        <div class="chart-view" style="max-width: 500px; ">
            <canvas id="chartCate"></canvas>
        </div>
    </div>
    @endsection