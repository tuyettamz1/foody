@extends('layouts.main')
@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2><i class="fa fa-edit"></i> Edit User Profile {{$profile->fullname}}</small></h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    
    
    @if ($errors->any())
    <div class="alert alert-danger col-10 offset-1">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="col-md-8">
      <form method="post" action="{{route('profile.postEdit')}}" enctype="multipart/form-data" class="form-horizontal form-label-left">
        @csrf
        <div class="form-group">
          <label>Username</label>
          <input class="form-control" readonly="" value="{{$profile->user->name}}">
        </div>
        <div class="form-group">
          <label>Full Name</label>
          <input class="form-control" value="{{$profile->fullname}}" readonly="" name="fullname">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" value="{{$profile->email}}" readonly="" name="email">
        </div>
        <div class="form-group">
          <label>Position</label>
          <select name="position" class="form-control">
            @foreach($positions as $position)
            <option value="{{$position->id}}" <?php if ($position->id==$profile->position_id) echo "selected"; ?> >{{$position->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input name="phone" class="form-control" value="{{$profile->phone}}">
        </div>
        <div class="form-group">
          <label>Address</label>
          <input name="address" class="form-control" value="{{$profile->address}}">
        </div>
        <div class="form-group">
          <label>Identity Card</label>
          <input name="identity_card" class="form-control" value="{{$profile->identity_card}}">
        </div>
        <div class="form-group">
          <label>Birthday</label>
          <input type="date" class="form-control" name="birthday" value="{{$profile->birthday}}">
        </div>
        <div class="form-group">
          <label>Date Start Work</label>
          <input type="date" class="form-control" value="{{$profile->work_start}}" name="work_start">
        </div>
        <div class="form-group">
          <label>Gender</label>
          <div class="col-2 col-form-label">
            <input class="" type="radio" name="gender" value="0" {{$profile->gender==0?'checked':''}}>&nbsp&nbspMale
            
          </div>
          <div class="col-2 col-form-label">
            <input class="" type="radio" name="gender" value="1" {{$profile->gender==1?'checked':''}}>&nbsp&nbspFemale
          </div>
        </div>
        <div class="form-group">
          <label>Avatar</label>
          <input type="file" class="form-control"  name="avatar">
        </div>
        <div class="form-group">
         <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
       </div>
     </form>

   </div>
   <div class="col-md-3  col-sm-12 ">
    <h4>User Avatar</h4>
    <img class="-right" src="/images/avatar/{{$profile->avatar}}" height="300" style="width:100%">
  </div>
</div>
@endsection