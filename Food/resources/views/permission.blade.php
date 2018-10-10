@extends('layouts.frontend')
@section('content')
<base href="{{asset('')}}">
<link href="backend/css/bootstrap.min.css" rel="stylesheet">
<link href="backend/fonts/css/font-awesome.min.css" rel="stylesheet">
<div style="height: 100px"></div>
<div class="container" style="min-height: 430px">
    <div class="card">
        <div class="text-center"><i class="fa fa-5x fa-frown-o" style="color:#d9534f;"></i></div>
        <h1 class="text-center">Permission is denied !</h1>
        <p class="text-center text-danger"> 
        	@if (session('warning'))            
            {{ session('warning') }}
            @endif
        </p>
        <p class="text-center"><a class="btn btn-primary" href="/"><i class="fa fa-home"></i> Về trang chủ</a></p>
    </div>
</div>
@endsection