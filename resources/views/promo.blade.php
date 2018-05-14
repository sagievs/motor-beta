@extends('layouts.master')
@section('title', $page->title)
@section('keywords', $page->keywords)
@section('description', $page->description)

@section('content')
    
    <section id="block__about" class="promo common">

        <div class="container">
            <div class="block__about_r row">

                <div class="block__about__left col-lg-2 col-md-2 col-sm-2">

                    @include('partials.product-bar')

                    @include('partials.banner-sidebar')

                </div>

                <div class="block__about__right col-lg-10 col-md-10 col-sm-10">
                    @include('partials.breadcrumb')

                    <h2 class="secondary-text">{{ $page->title }}</h2>

                    <div class="promo__r row">

                    	<div class="promo__slider">
                    		
							<div class="promo__slider-1">
                                @foreach($promoSlides as $slide)
	                    		<div class="promo promo__slide">
                                    <a href="{{ route('promo.single', $slide) }}"><img src="{{ Storage::exists($slide->image) ? Storage::url($slide->image) : URL::to('images/'.$slide->image) }}" alt="{{ $slide->title }}"></a>
									<div class="promo_slider_text">
										<a href="{{ route('promo.single', $slide) }}"><p>{{ $slide->title }}</p></a>
									</div>
                                </div>
                                @endforeach
							</div>

							<div class="promo__slider_2">
                                @foreach($promoSlides as $slide)
								<div class="about about_slide">
	                            	<img src="{{ Storage::exists($slide->image) ? Storage::url($slide->image) : URL::to('images/'.$slide->image) }}" alt="акции слайд">
	                            </div>
	                            @endforeach
	                        </div>

                    	</div>
                    	
                    	


                    </div>


                </div>

            </div>


        </div>


    </section>

    @include('partials.recomended')

@endsection
