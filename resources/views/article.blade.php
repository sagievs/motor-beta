@extends('layouts.master')
@section('title', $post->title)
@section('keywords', $post->keywords)
@section('description', $post->description)

@section('content')

<section id="block__about">

	<div class="container">
		<div class="block__about_r row">
			
			<div class="block__about__left col-lg-2 col-md-2 col-sm-2">
		
                @include('partials.product-bar')

                @include('partials.banner-sidebar')

			</div>

			<div class="block__about__right col-lg-10 col-md-10 col-sm-10">
                @include('partials.breadcrumb')

	            <h2 class="secondary-text">{{ $post->title }}</h2>

	            
	            	@if(!empty($post->image))<img class="block__about_img" src="{{Storage::exists($post->image) ? Storage::url($post->image) : URL::asset('images/'.$post->image)}}" alt="{{ $post->title }}">@endif
	            

	             <div class="block__about__right2">
	            	<p>{{ $post->body }}</p>
					<div class="ya-share2" data-services="vkontakte,twitter,facebook,telegram,whatsapp,gplus" data-counter></div>
	            </div>


			</div>

		</div>

	</div>
	

</section>

@include('partials.recomended')


@endsection
@section('scripts')
<script src="https://yastatic.net/share2/share.js" async="async"></script>
@endsection
