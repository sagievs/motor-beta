@extends('layouts.master')
@section('title', $page->title)

@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="zag">{{ $page->title }}<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
            	<div class="cc">
					<center></center>
				</div>
				<div class="cc">
					@foreach($mainCategories as $category)
			        <div class="cat-block">
			            <div class="cat-name">{{ $category->title }}</div>
			            <div class="cat-more"><a href="{{ route('category', $category) }}" class="mmore">Перейти в каталог</a></div>
			        </div>
			        @endforeach
				</div>
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
