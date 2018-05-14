@extends('layouts.master')
@section('title', $page->title)

@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="zag">{{ $page->title }}<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
            	<div class="gallery-con">
					<div class="clears"></div>
				</div>
				<div class="gallery-inside-con">
					<div style="width: 100%; float: left; text-align: center;">
                    @foreach($photos as $photo)
					<a href="{{ Storage::url($photo->image) }}" class="fancyboxa"  data-fancybox-group="gallery">
						<div class="pho" style="background: url({{ Storage::url($photo->image) }}) center;"></div>
                    </a>
                    @endforeach
			</div>
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
@section('styles')
<link rel="stylesheet" href="{{ URL::to('fancybox/jquery.fancybox.css') }}">
@endsection
@section('scripts')
<script src="{{ URL::to('fancybox/jquery.fancybox.js') }}"></script>
<script>
$(document).ready(function() {
	$('.fancyboxa').fancybox();
});
</script>
@endsection
