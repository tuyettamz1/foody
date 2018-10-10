@extends('layouts.frontend')
@section('content')
<div class="container" style="margin-bottom: 136px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <section>
                <h3 class="entry-title text-center">
                    <span>
                        Đăng ký với chúng tôi
                    </span>
                </h3>
                <hr>
                    @if ($errors->any())
                    <div class="alert alert-dismissible alert-danger">
                        <button class="close" data-dismiss="alert" type="button">
                            ×
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('register') }}" enctype="multipart/form-data" class="form-horizontal" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-3">
                                Địa chỉ Email
                                <span class="text-danger">
                                    *
                                </span>
                            </label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-envelope">
                                        </i>
                                    </span>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Nhập vào địa chỉ Email" type="email" value="{{ old('email') }}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">
                                Mật khẩu
                                <span class="text-danger">
                                    *
                                </span>
                            </label>
                            <div class="col-md-8 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock">
                                        </i>
                                    </span>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Nhập mật khẩu" type="password">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">
                                Nhập lại mật khẩu
                                <span class="text-danger">
                                    *
                                </span>
                            </label>
                            <div class="col-md-8 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock">
                                        </i>
                                    </span>
                                    <input class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">
                                Tên của bạn
                                <span class="text-danger">
                                    *
                                </span>
                            </label>
                            <div class="col-md-8 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user">
                                        </i>
                                    </span>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nhập tên của bạn" value="{{ old('name') }}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">
                                Avatar
                                <br>
                                </br>
                            </label>
                            <div class="col-md-8 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon" id="file_upload">
                                        <i class="glyphicon glyphicon-upload">
                                        </i>
                                    </span>
                                    <input class="form-control upload" name="avatar" type="file">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-10">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-sign-out">
                                    </i>
                                    Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>
                </hr>
            </section>
        </div>
    </div>
</div>
@endsection
