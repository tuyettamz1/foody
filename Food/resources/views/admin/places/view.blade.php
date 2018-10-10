@extends('layouts.admin')
@section('content')
<style>
    td{
        font-weight: bold;
    }
</style>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3></h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thông tin địa điểm <small></small></h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   @if(session('success'))
                   <div class="bs-component">
                      <div class="alert alert-dismissible alert-success">
                        <button class="close" type="button" data-dismiss="alert">×</button>
                        <strong>{{session('success')}}</strong>
                    </div>
                </div>
                @endif
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                        <!-- end of image cropping -->
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <div class="avatar-view" title="Change the avatar">
                                <img src="/frontend/images/{{$place->image}}" alt="Avatar" style="width: 220px;height: 220px">
                            </div>                               
                            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                        </div>
                        <!-- end of image cropping -->
                    </div>
                   
                    @if($place->status!=1)
                    <a class="btn btn-primary" href="/admin/places/approved/{{$place->id}}/1" onclick="return confirm('Bạn có muốn phê duyệt địa điểm này không ?');">Phê duyệt</a>
                    <a class="btn btn-danger" href="/admin/places/approved/{{$place->id}}/2" onclick="return confirm('Bạn có muốn bỏ qua địa điểm này không ?');">Bỏ qua</a>
                    <br />
                    @endif
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12" style="margin-left: 50px">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Thông tin chi tiết</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                               <table class="table table-user-information">
                                <tbody>
                                  <tr>
                                    <td>Tên địa điểm</td>
                                    <td style="font-weight: bold;color: red">{{$place->name}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$place->address}}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{$place->category->name}}</td>
                                </tr>

                                <tr>
                                    <td>Khu vực</td>
                                    <td>{{$place->district->name}}</td>
                                </tr>

                                <tr>
                                 <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{$place->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Giá</td>
                                    <td>Từ {{$place->price_from}}đ đến {{$place->price_to}}đ</td>
                                </tr>                               
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

