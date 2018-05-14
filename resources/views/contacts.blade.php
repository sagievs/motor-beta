@extends('layouts.master')
@section('title', $page->title)
@section('keywords', $page->keywords)
@section('description', $page->description)

@section('content')

<section id="block__about" class="contacts common">

	<div class="container">
		<div class="block__about_r row">
			
			<div class="block__about__left col-lg-2 col-md-2 col-sm-2">
		
                @include('partials.product-bar')

                @include('partials.banner-sidebar')

			</div>

			<div class="block__about__right col-lg-10 col-md-10 col-sm-10">
                @include('partials.breadcrumb')

	            <h2 class="secondary-text">{{ $page->title }}</h2>

		        <div class="contact__r row">
					<div class="contact__r__left col-lg-2">
						<div class="contact__r__phone">

							<p class="contact__r__bold">Телефоны</p>

							<div class="contact__r__wrap">
								<a href="tel:+{{ preg_replace("/[^,.0-9]/", '', $contact_phone1) }}">{{ $contact_phone1 }}</a>
								<span>(Магазин)</span>
							</div>

							<div class="contact__r__wrap">
								<a href="tel:+{{ preg_replace("/[^,.0-9]/", '', $contact_phone2) }}">{{ $contact_phone2 }}</a>
								<span>(Бухгалтерия)</span>
							</div>
								
						</div>
						<div class="contact__r__mail">
							
							<p class="contact__r__bold">E-mail</p>

							<a href="mailto:{{ $siteemail }}">{{ $siteemail }}</a>
						</div>
						<div class="contact__r__address">
							
							<p class="contact__r__bold">Адрес</p>

							<span>{{ $siteaddress }}</span>
						</div>
					</div>
					<div class="contact__r__right col-lg-10">

						<img src="{{URL::asset('images/contacts-page-img.jpg')}}" alt="контакты">
					</div>
					
				</div>
	            

			</div>

		</div>



	</div>
	

</section>

@include('partials.recomended')

@endsection
