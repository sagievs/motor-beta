@extends('layouts.master')
@section('title', $page->title)
@section('keywords', $page->keywords)
@section('description', $page->description)

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

                    <h2 class="secondary-text">{{ $page->title }}</h2>

                    <div class="block__about__content">
                        <div class="accordion accordion__faq">
                            @foreach($faqs as $faq)
                            <div class="accordion_header">
                                <h3>{{ $faq->key }}<img src="{{URL::asset('images/up-arrow.svg')}}" alt="аккордеон">
                                </h3>
                            </div>
                            <div class="accordion_body">
                                <div class="first_body">{{ $faq->value }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @include('partials.advantages')

                </div>

            </div>

        </div>


    </section>

    @include('partials.recomended')


@endsection
