@extends('layouts.admin')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>
      <i class="fa fa-th-list"></i> Danh sách địa điểm
      </h2>
      <ul class="nav navbar-right panel_toolbox">
       
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
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên địa điểm</th>
            <th>Địa chỉ</th>
            <th>Phone</th>
            <th>Category</th>                      
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1;?>
          @foreach($places as $place)
          <tr>
            <th>{{$i}}</th>
            <th>{{$place->name}}</th>
            <td>{{$place->address}}</td>
            <td>{{$place->phone}}</td>
            <td>{{$place->category->name}}</td>                   
                     
            <td>
              <a href="/admin/places/view/{{$place->id}}"><button class="btn btn-primary btn-sm">Xem</button></a>
              <a href="/admin/places/delete/{{$place->id}}" onclick="return confirm('Are you sure you want to delete this place?');"><button class="btn btn-danger btn-sm">Xóa</button></a>
            </td>
          </tr>
          <?php $i++?>
          @endforeach                                        
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection