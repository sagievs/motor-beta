<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ URL::to('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/vendor/linearicons/style.css') }}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    @yield('styles')
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
    <!-- NAVBAR -->
    @include('admin.partials.header')
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    @include('admin.partials.sidebar')
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{ URL::to('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script src="{{ URL::to('admin/scripts/klorofil-common.js') }}"></script>
@yield('scripts')
</body>

</html>
