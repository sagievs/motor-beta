@extends('layouts.master')
@section('title', 'Поиск')
@section('content')

    <section id="block__about" class="subcategory common">

        <div class="container">
            <div class="block__about_r row">

                <div class="block__about__left col-lg-2 col-md-2 col-sm-2">

                    @include('partials.product-bar')

                    @include('partials.banner-sidebar')

                </div>

                <div class="block__about__right col-lg-10 col-md-10 col-sm-10">
                    
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Поиск</li>
                    </ol>
                </nav>

                    <h2 class="secondary-text">@if($products->count() > 0 || $categories->count() > 0) Результаты поиска по запросу '{{ $q }}' @else К сожалению, по запросу '{{ $q }}' нету результатов @endif</h2>

                    <h2 class="secondary-text"Товары</h2>

                    <div class="subcategory__r row">
                        <div class="product-list">
                            @if($products->count() > 0)

                                @foreach($products as $product)
                                    <div class="special-cont">
                                        <a href="{{ route('product', [$product->category->parent->slug, $product->category, $product]) }}">
                                            <img src="{{URL::asset('images/'.$product->thumbnail)}}"
                                                 alt="{{ $product->title }}">
                                        </a>
                                        <p class="pr-desc">{{ $product->title }}</p>
                                        <div class="price-wrap">
                                            <p>{{ number_format($product->price, 0, ',', ' ') }} тг</p>
                                        </div>
                                        <div id="img-product" class="cart-wrap rounded-circle atoc"
                                             data-id="{{ $product->id }}">
                                            <img class="align-middle loc-center"
                                                 src="{{URL::asset('images/shopping-cart.svg')}}" alt="корзина">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="pagination-r row">

                        {{ $products->links() }}

                    </div>

                    <h2 class="secondary-text"Категории</h2>

                    <div class="subcategory__r row">
                        <div class="product-list">
                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                <div class="product__cont">
                                    <img src="{{URL::asset('images/'.$category->image)}}" alt="продукты">
                                    <p class="product__desc">{{ $category->title }}</p>
                                    <div class="button product_button">
                                        <a href="@if(!empty($category->parent)) {{ route('category', [$category->parent->slug, $category]) }} @else  {{ route('category', $category) }} @endif" class="btn btn-secondary border-0 rounded btn-product">Каталог</a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="pagination-r row">

                        {{ $categories->links() }}

                    </div>

                </div>

            </div>


        </div>


    </section>

    @include('partials.recomended')


@endsection
