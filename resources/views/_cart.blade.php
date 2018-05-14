@extends('layouts.master')
@section('title', 'Корзина')
@section('content')

    <section id="block__about" class="product common">

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
                            <li class="breadcrumb-item active" aria-current="page">Корзина</li>
                        </ol>
                    </nav>

                    <div class="cart__r row">
                        <h2 class="secondary-text">Корзина</h2>

                        <div class="cart__block_1"></div>
                        @if(session()->has('cart'))
                        @foreach($products as $product)
                        <?php $category = \App\Category::where('id', $product['item']['category_id'])->first() ?>
                        <div class="cart__block">
                            <div class="cart__block__item">
                                <img src="{{URL::asset('images/'.$product['item']['thumbnail'])}}" alt="{{ $product['item']['title'] }}">
                            </div>
                            <div class="cart__block__item">
                                <a href="{{ route('product', [$category->parent->slug, $category, $product['item']['id']]) }}"><p class="cart__text">{{ $product['item']['title'] }}</p></a>
                            </div>
                            <div class="cart__block__item">
                                <p class="cart__qt">Кол-во</p>
                            </div>
                            <div class="cart__block__item">
                                <div class="counter">
                                    <span class="counter counter_button butt dec">
                                        {{--<a href="{{ route('cart.reduce', $product['item']['id']) }}">--}}
                                            <img src="{{URL::asset('images/left-cart-arrow-rec.svg')}}" class="arrow-reduce" data-id="{{ $product['item']['id'] }}" alt="корзина">
                                        {{--</a>--}}
                                    </span>
                                    <input type="text" name="count" data-id="{{ $product['item']['id'] }}" class="field field_count" value="{{ $product['qty'] }}" data-min="1" data-max="1000">
                                    <span class="counter counter_button but inc">
                                    {{--<a href="{{ route('cart.add', $product['item']['id']) }}">--}}
                                        <img src="{{URL::asset('images/right-cart-arrow-rec.svg')}}" class="arrow-increase" data-id="{{ $product['item']['id'] }}" alt="корзина">
                                    {{--</a>--}}
                                    </span>
                                </div>

                            </div>
                            <div class="cart__block__item">
                                <p class="car__par-text">{{ number_format($product['item']['price'], 0, ',', ' ') }} тг</p>
                            </div>
                            <div class="cart__block__item">
                                <div class="cart__wrap-img">
                                    {{--<a href="{{ route('cart.remove', $product['item']['id']) }}">--}}
                                        <img src="{{URL::asset('images/cross-cart.svg')}}" alt="закрыть" class="arrow-remove" data-id="{{ $product['item']['id'] }}">
                                    {{--</a>--}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="cart__block">
                        <p>В корзине пока товаров нет<br><br> Перейти в <a href="{{ route('catalog') }}">Каталог</a></p>
                        </div>
                        @endif

                    </div>
                    @if(session()->has('cart'))
                    <div class="cart__res">
                        <div class="cart__el">
                          <p class="cart__el__total">Общая сумма</p>
                        </div>
                        <div class="cart__el">
                          <p class="cart__el__price">{{ number_format($totalPrice, 0, ',', ' ') }} тг</p>
                        </div>
                        <div class="cart__el">
                            <a href="{{ route('checkout') }}" class="btn btn-secondary border-0 rounded btn-cart">
                              <span>Оформить заказ</span>
                            </a>
                        </div>
                    </div>
                    @endif

                </div>

            </div>


        </div>


    </section>

    @if(!empty($recomended))
    <section id="recommend" class="purchase__often">

        <div class="container">
            <div class="row">
                <h1 class="text-center w-100 main-text">С этими товарами покупают</h1>
                <div class="purchase-slider col-md-12">
                    @foreach($recomended as $recomendas)
                    @foreach($recomendas as $recom)
                    @if(!empty($recom->category->parent->slug))
                    <div class="rec-col col col-lg-2">
                        <div id="like-product" class="like-wrap rounded-circle">
                            <img src="{{URL::asset('images/like.svg')}}" alt="мы рекомендуем">
                        </div>
                        <a href="{{ route('product', [$recom->category->parent->slug, $recom->category, $recom]) }}"><img src="{{URL::asset('images/'.$recom->thumbnail)}}" alt="{{ $recom->title }}"></a>
                        <a href="{{ route('product', [$recom->category->parent->slug, $recom->category, $recom]) }}"><p class="pr-desc">{{ $recom->title }}</p></a>
                        <div class="price-wrap">
                            <p>{{ number_format($recom->price, 0, ',', ' ') }} тг</p>
                        </div>
                        <div id="img-product" class="cart-wrap rounded-circle atoc" data-id="{{ $recom->id }}">
                            <img class="align-middle loc-center"
                                 src="{{URL::asset('images/shopping-cart.svg')}}" alt="корзина">
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach

                </div>
            </div>
        </div>

    </section>
    @endif


@endsection
@section('scripts')
<script>
    var changeQtyUrl = '{{ route('cart.change-qty') }}';
    var reduceQtyUrl = '{{ route('cart.ajax-reduce') }}';
    var increaseQtyUrl = '{{ route('cart.ajax-increase') }}';
    var removeQtyUrl = '{{ route('cart.ajax-remove') }}';
    var inputQty = $('input.field_count');
    var cartBlock = $('.cart__block_1');
    $(document).ready(function()
    {
        inputQty.change(function()
        {
            var qty = $(this).val();
            var id = $(this).data('id');
            if(parseInt(qty) > 0 && parseInt(qty) < 1001 && $.isNumeric(qty))
            {
                $.ajax({
                    url: changeQtyUrl,
                    data: { qty: qty, id:id, _token:token},
                    method: 'post',
                    success: function(data) {
                        $('.cart__el__price').html(data.totalPrice+' тг');
                        $('span.count').html(data.totalQty);
                    }
                });
            }
            else {
                alert('Введены неверные данные! Интервал: 1-1000. Попробуйте еще раз')
            }
        })
        $(document).on('click', '.arrow-reduce', function () {
            var id = $(this).data('id');
            var thisQty = $(this).parent().parent().find('input.field_count');
            if(parseInt(thisQty.val()) > 1)
            {
                // console.log(thisQty.val()); 
                $.ajax({
                    url: reduceQtyUrl,
                    data: {id: id, _token: token},
                    method: 'post',
                    success: function (data) {
                        $('.cart__el__price').html(data.totalPrice+' тг');
                        $('span.count').html(data.totalQty);
                        var qty = thisQty.val()-1;
                        thisQty.val(qty);
                    },
                    error: function () {
                        alert('Ошибка');
                    }
                })
            }
            else{
                alert('Самая минимальное количество 1!')
            }
        })
        $(document).on('click', '.arrow-increase', function () {
            var id = $(this).data('id');
            var thisQty = $(this).parent().parent().find('input.field_count');
            if(parseInt(thisQty.val()) < 1001)
            {
                // console.log(thisQty.val()); 
                $.ajax({
                    url: increaseQtyUrl,
                    data: {id: id, _token: token},
                    method: 'post',
                    success: function (data) {
                        // console.log(data);
                        $('.cart__el__price').html(data.totalPrice+' тг');
                        $('span.count').html(data.totalQty);
                        var qty = parseInt(thisQty.val())+1;
                        thisQty.val(qty);
                    },
                    error: function () {
                        alert('Ошибка');
                    }
                })
            }
            else{
                alert('Самая максимальное количество 1000!');
            }
        })
        $(document).on('click', '.arrow-remove', function () {
            var id = $(this).data('id');
            $(this).parent().parent().parent().hide();
            $.ajax({
                url: removeQtyUrl,
                data: {id: id, _token: token},
                method: 'post',
                success: function (data) {
                    // console.log(data);
                    if(data.totalQty > 0)
                    {
                        $('.cart__el__price').html(data.totalPrice+' тг');
                        $('span.count').html(data.totalQty);
                    }
                    else 
                    {
                        $('.cart__cont').hide();
                        cartBlock.show();
                        $('.cart__res').hide();
                        cartBlock.html('<p>В корзине пока товаров нет<br><br> Перейти в <a href="/catalog">Каталог</a></p>');
                        console.log('>=0');
                    }
                },
                error: function () {
                    $('.cart__cont').hide();
                    cartBlock.show();
                    $('.cart__res').hide();
                    cartBlock.html('<p>В корзине пока товаров нет<br><br> Перейти в <a href="/catalog">Каталог</a></p>');
                    console.log('Error');
                }
            })
        })
    })
</script>
@endsection
