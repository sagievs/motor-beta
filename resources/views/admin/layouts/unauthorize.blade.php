<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ URL::to('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendor/linearicons/style.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ URL::to('admin/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ URL::to('admin/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::to('admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::to('admin/img/favicon.png') }}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">Панель управления Laravel</h1>
                        <p>IMarketing</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>

</html>
