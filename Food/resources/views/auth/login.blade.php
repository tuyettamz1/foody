@extends('layouts.frontend')
@section('content')
<div class="container" style="margin-top: 100px;min-height: 430px">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            @if ($errors->any())
            <div class="alert alert-dismissible alert-danger">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <i class="fa fa-sign-in"></i> Vui lòng đăng nhập vào hệ thống</h3>
                </div>                    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br />
                            <a href="http://www.jquery2dotnet.com" class="btn facebook btn-block" role="button"><i class="fa fa-facebook"></i> Đăng nhập bằng facebook</a>
                            <br />
                            <a href="{{ url('/login/google') }}" class="btn btn-danger btn-block" role="button"><i class="fa fa-google"></i> Đăng nhập bằng Google</a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 login-box">
                            <form method="POST" action="{{ route('login') }}">
                               @csrf
                               <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input placeholder="Tên đăng nhập" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input placeholder="Mật khẩu" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                            <p>                                
                                Không có tài khoản? <a href="/register">Đăng ký ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="checkbox">
                                    <label>
                                     <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                     Ghi nhớ
                                 </label>
                             </div>
                         </div>
                         <div class="col-xs-6 col-sm-6 col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-sign-in"></i> Đăng nhập</button>
                                <span type="button" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-remove"></i> Hủy bỏ</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
    .btn-label {position: relative;left: -12px;display: inline-block;padding: 6px 12px;background: rgba(0,0,0,0.15);border-radius: 3px 0 0 3px;}
    .btn-labeled {padding-top: 0;padding-bottom: 0;}
    .input-group { margin-bottom:10px; }
    .separator { border-right: 1px solid #dfdfe0; }
    .facebook,.twitter { min-width:170px; }
    .facebook { background-color:#354E84;color:#fff; }
    .twitter { background-color:#00A5E3;color:#fff; }
    .facebook:hover,.twitter:hover { color:#fff; }
</style>
@endsection
