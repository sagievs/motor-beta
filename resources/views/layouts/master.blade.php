<!DOCTYPE html>
<html>
<head>
	<title>{{ $sitename }} | @yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, itial-scale=1, maximus-scale=1">
	@yield('styles')
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/style.css') }}" />
	<script type="text/javascript" src="{{ URL::to('js/js.js') }}"></script> <!-- Библиотека -->
	<script src="{{ URL::to('js/mobilyslider.js') }}" type="text/javascript"></script> <!-- Скрипт слайдера -->
	<script src="{{ URL::to('js/init.js') }}" type="text/javascript"></script> <!-- Скрипт слайдера -->
	<script type="text/javascript" src="{{ URL::to('js/jquery.flexisel.js') }}"></script> <!-- Скрипт Карусельки с брендами -->
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel(); 
		});
	</script>
	<script type="text/javascript">
		function openbox(id){
		    display = document.getElementById(id).style.display;

		    if(display=='none'){
		       document.getElementById(id).style.display='block';
		    }else{
		       document.getElementById(id).style.display='none';
		    }
		}
	</script>
</head>
<body>
@include('partials.header')
@yield('content')
@include('partials.footer')
{{--<script src="{{ URL::to('libs/jquery/jquery-3.2.1.min.js') }}"></script>--}}
<script>
	var url = '{{ route('form') }}';
	var addToCartUrl = '{{ route('add.cart') }}';
	var token = '{{ session()->token() }}';
</script>
@yield('scripts')
</body>
</html>
