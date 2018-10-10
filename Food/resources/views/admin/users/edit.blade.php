@extends('layouts.admin')
@section('content')
<div class="col-md-8 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>
        <i class="fa fa-edit"></i> Cập nhật thành viên : {{$user->name}}</b>       
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
    <div class="x_content">
      <form class="form-horizontal" action="{{route('users.edit',$user->id)}}" method="post">
        @csrf
        <div class="form-group row">
          <label class="control-label col-md-3">Name</label>
          <div class="col-md-8">
            <input class="form-control" value="{{$user->name}}" name="name">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Email</label>
          <div class="col-md-8">
            <input class="form-control" type="email" value="{{$user->email}}" disabled="">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">Phân quyền</label>
          <div class="col-md-8">
            <select name="role" class="form-control">
             @foreach($roles as $role)
             <option value="{{$role->id}}" <?php if ($role->id==$user->role_id) echo "selected"; ?> >{{$role->name}}</option>
             @endforeach
           </select>
         </div>
       </div>
       <div class="form-group row">
        <label class="control-label col-md-3">Trạng thái </label>
        <div class="col-md-8">
          <select name="status" class="form-control">
           <option value="1">Hoạt động</option>
           <option value="0">Ngừng hoạt động</option>
         </select>
       </div>
     </div>
     <div class="col-md-offset-5">
       <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
     </div>               
   </form>
 </div>
</div>
</div>
@endsection

