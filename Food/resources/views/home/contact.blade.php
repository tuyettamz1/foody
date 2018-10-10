@extends('layouts.frontend')
@section('content')
<div class="container">
  <div class="row">
    <!-- Map Column -->
    <div class="col-lg-8 mb-4">
      <h3 class="mt-4 mb-3">Liên hệ với chúng tôi</h3>
      <hr>
      @if ($errors->any())
      <div class="alert alert-danger col-10 offset-1">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(session('success'))
      <div class="bs-component">
        <div class="alert alert-dismissible alert-success">
          <button class="close" type="button" data-dismiss="alert">×</button>
          <strong>{{session('success')}}</strong>
        </div>
      </div>
      @endif
      <form name="sentMessage" id="contactForm" action="{{route('contact')}}" method="post">
        @csrf
        <div class="control-group form-group">
          <div class="controls">
            <label>Tên của bạn:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Số điện thoại:</label>
            <input type="number" value="{{old('phone')}}" class="form-control" id="phone" name="phone">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Địa chỉ Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Nội dung:</label>
            <textarea rows="5" cols="100" class="form-control" name="body" maxlength="999" style="resize:none"></textarea value="{{old('body')}}">
          </div>
        </div>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-success" id="sendMessageButton">Gửi yêu cầu</button>
      </form>
    </div>
    <!-- Contact Details Column -->
    <div class="col-lg-4 mb-4">
      <h3 class="mt-4 mb-3">Thông tin liên hệ</h3>
      <hr>
      <p>
        32 Nguyễn Lương Bằng
        <br>Hòa Khánh. Liên Chiểu, Đà Nẵng
        <br>
      </p>
      <p>
        <i class="fa fa-phone"></i> (123) 456-7890
      </p>
      <p>
        <i class="fa fa-envelope"></i>
        <a href="mailto:name@example.com">email@example.com
        </a>
      </p>
      <p>
        <i class="fa fa-clock-o"></i> Monday - Friday: 7:00 AM to 19:00 PM
      </p>
    </div>
  </div>


</div>
<div style="height: 40px"></div>
@endsection