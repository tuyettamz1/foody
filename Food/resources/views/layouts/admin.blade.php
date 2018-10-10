<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đồ Án Tốt Nghiệp 2018 </title>
    <!-- Bootstrap core CSS -->
    <base href="{{asset('')}}">
    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="backend/css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="backend/css/custom.css" rel="stylesheet">
    <script src="backend/js/jquery.min.js"></script>
    <script src="backend/js/nprogress.js"></script>
</head>
 <?php
    $notifications = App\Place::where('status',0)->count();
    $places = App\Place::where('status',0)->get();
    ?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/admin" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="backend/images/admin.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome <i class="fa fa-bullhorn"></i></span>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3 class="label label-danger" style="margin-left: 20px">Administrator</h3>
                            <ul class="nav side-menu">
                                <li><a href="/admin"><i class="fa fa-home"></i> Dashboard </a></li>
                                <li><a href="/"><i class="fa fa-paw"></i> Xem trang chủ </a></li>
                                <li><a><i class="fa fa-edit"></i> Quản lý địa điểm <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="/admin/places">Đang hoạt động</a>
                                        <li><a href="/admin/places/pending">Chờ phê duyệt</a>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-user"></i> Quản lý thành viên <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="admin/users">Danh sách thành viên</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-map-marker"></i> Quản lý khu vực <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="admin/districts">Danh sách khu vực</a>
                                        </li>
                                        <li><a href="admin/districts/create">Thêm mới khu vực</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-th-list"></i> Quản lý Category <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="/admin/categories">Danh sách Category</a>
                                        </li>
                                        <li><a href="/admin/categories/create">Thêm mới Category</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-th-list"></i> Quản lý Quảng cáo <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="/admin/categories">Danh sách Quảng cáo</a>
                                        </li>
                                        <li><a href="/admin/categories/create">Thêm mới Quảng cáo</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="backend/images/admin.jpg" alt="">{{Auth::user()->name}}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Đổi mật khẩu</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span><i class="fa fa-cog"></i> Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Help</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <i class="fa fa-sign-out"></i>  Thoát ra
                               </a>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i> Thông báo
                                    <span class="badge badge-danger">@if($notifications >0){{$notifications}} @endif</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    @foreach($places as $place)
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="backend/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>{{$place->user->name}}</span>
                                            <span class="time">{{$place->created_at}}</span>
                                            </span>
                                            <span class="message">
                                        {{$place->name}} 
                                    </span>
                                        </a>
                                    </li>
                                    @endforeach
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong><a href="admin/places/pending">Xem tất cả</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="backend/js/bootstrap.min.js"></script>
   
    <script src="backend/js/nicescroll/jquery.nicescroll.min.js"></script>

    <!-- daterangepicker -->
    <script type="text/javascript" src="backend/js/moment.min.js"></script>
    <script type="text/javascript" src="backend/js/datepicker/daterangepicker.js"></script>

    <script src="backend/js/custom.js"></script>

</body>

</html>
