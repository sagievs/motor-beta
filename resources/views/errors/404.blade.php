@extends('layouts.master')
@section('title', 'Страница не найдена')

@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="zag">Страница не найдена<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
            	<div class="gallery-con">
					<div class="clears"></div>
				</div>
				<div class="gallery-inside-con">
					<div class="clears"></div> 
				</div>
            </div>
            <div class="sidebar-block">
            	@include('partials.statsidebar')
                @include('partials.banner-sidebar')
            </div>
		</div>
	</div>
</div>

@endsection
