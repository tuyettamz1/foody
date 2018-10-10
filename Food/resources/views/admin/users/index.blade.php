@extends('layouts.admin')
@section('content')
<div class="col-md-8 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>
        <i class="fa fa-th-list"></i> Danh sách thành viên</b>       
      </h2>
      <ul class="nav navbar-right panel_toolbox">
        <li>
          <a class="collapse-link">
            <i class="fa fa-chevron-up">
            </i>
          </a>
        </li>       
      </ul>
      <div class="clearfix">
      </div>
    </div>
    @if(session('success'))
    <div class="bs-component">
      <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">×</button>
        <strong>{{session('success')}}</strong>
      </div>
    </div>
    @endif
    <div class="x_content">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Role</th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>
             <a href="{{route('users.edit',$user->id)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</button></a>
             
             <a href="{{route('users.delete',$user->id)}}" onclick="return confirm('Are you sure you want to delete this user?');"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Xóa</button></a>
           </td> 
         </tr>
         @endforeach  
       </tbody>
     </table>
    </div>
  </div>
</div>
@endsection
