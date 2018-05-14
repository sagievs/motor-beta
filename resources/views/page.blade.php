@extends('layouts.master')
@section('title', $page->title)

@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="zag">{{ $page->title }}<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
                @if($page->image)
                <p style="text-align: center;">
    <img alt="" src="{{ Storage::url($page->image) }}" style="width: 100%; max-width: 670px; height: auto;" /></p>
                @endif
            	@if($page->body)
            	{!! $page->body !!}
            	@else
            	<p>Данный раздел находится в наполнении</p>
            	@endif
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
