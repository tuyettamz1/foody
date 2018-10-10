<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đồ Án Tốt Nghiệp 2018 </title>
    @include('layouts.frontend.link')
</head>
<body class="nav-md">
    <div class="container body" style="min-height: 530px">
        <div class="main_container">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                @include('layouts.frontend.nav')
            </nav>
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <footer>
        @include('layouts.frontend.footer')
    </footer>
    @yield('script')
</body>
</html>