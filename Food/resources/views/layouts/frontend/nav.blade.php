    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" class="active"><i class="fa fa-home"></i> Trang chủ <span class="sr-only">(current)</span></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li><a href="/lien-he"><i class="fa fa-comment"></i> Liên Hệ</a></li>
                <li><a href="/gioi-thieu"><i class="fa fa-paw"></i> Về chúng tôi</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list"></i> Danh mục <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Category::all() as $category)
                        <li>
                            <a href="/dia-diem/category/{{$category->id}}">
                                <i class="fa fa-paw"></i> {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>                            
            <ul class="nav navbar-nav navbar-right">
                @if(!Auth::check())
                <li>
                    <a href="/register" class="font-weight-bold"><i class="fa fa-sign-in"></i> Đăng Ký</a>
                </li>
                <li>
                    <a href="/login" class="font-weight-bold"><i class="fa fa-sign-out"></i> Đăng Nhập</a>
                </li>
                @else
                <li>
                    <a href="/yeu-thich" class="font-weight-bold"><i class="fa fa-heart"></i> <span class="hidden-sm hidden-xs">Địa điểm yêu thích</span></a>
                </li>
                <li>
                    <a href="/them-dia-diem" class="font-weight-bold"><i class="fa fa-edit"></i> <span class="hidden-sm hidden-xs">Thêm địa điểm</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="hidden-sm hidden-xs">Thông báo <span class="badge badge-danger">3</span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">                                                                       
                        <li><a href="#"><i class="fa fa-sign-out"></i>Xem chi tiết</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/profile">Thông tin cá nhân</a></li>                                   
                        <li><a href="/doi-mat-khau">Đổi mật khẩu</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Thoát ra
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
