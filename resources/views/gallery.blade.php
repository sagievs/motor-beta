@extends('layouts.master')
@section('title', $page->title)

@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="zag">{{ $page->title }}<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
            	<div class="gallery-con">
					<div style="width:100%; float:left;">
						@foreach($albums as $album)
						<div class="photo">
							<a href="{{ route($album->slug) }}"><div class="photo-img" style="background: url({{ Storage::url($album->image) }}) center;"></div></a>
							<div class="photo-name"><a href="{{ route($album->slug) }}">{{ $album->title }}</a></div>
						</div>
						@endforeach
					</div>
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
