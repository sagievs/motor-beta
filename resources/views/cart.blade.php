@extends('layouts.master')
@section('title', 'Корзина')
@section('styles')
<link rel="stylesheet" href="{{URL::asset('libs/font-awesome/css/font-awesome.min.css')}}">
@endsection
@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="zag">Корзина<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
                @if(count($errors))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                @if(session()->has('cart'))
                <p style="text-align: center;"></p>
                <table>
                    <thead>
                        <tr>
                        <th colspan="2">Товар</th>
                        <th>Количество</th>
                        <th>Цена (шт)</th>
                        <th>В сумме</th>
                        <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <?php $category = \App\Category::where('id', $product['item']['category_id'])->first() ?>
                        <tr>
                            <td>
                                <a href="{{ route('product', [$category, $product['item']['id']]) }}">
                                    <img src="{{ Storage::url($product['item']['image']) }}"  style="max-width:50px" alt="White Blouse Armani">
                                </a>
                            </td>
                            <td><a href="{{ route('product', [$category, $product['item']['id']]) }}">{{ $product['item']['title'] }}</a>
                            </td>
                            <td>
                                <input type="number" value="{{ $product['qty'] }}" data-id="{{ $product['item']['id'] }}" class="cart-input">
                            </td>
                            <td>{{ number_format($product['item']['price'], 0, ',', ' ') }} тг</td>
                            <td class="item_price" data-price="{{ $product['item']['price'] }}">{{ number_format($product['price'], 0, ',', ' ') }} тг</td>
                            <td><a href="{{ route('cart.remove', $product['item']['id']) }}"><i class="fa fa-close"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{--<tfoot>
                        <tr>
                            <th colspan="4">Итого</th>
                            <th>{{ number_format($totalPrice, 0, ',', ' ') }} тг</th>
                        </tr>
                    </tfoot>--}}
                </table>
                <div class="total-price-info">
                    <p style="text-align: right; padding-right: 20px;">Итого: <span class="total_price">{{ number_format($totalPrice, 0, ',', ' ') }} тг</span></p>
                    <a style="float: right;" href="{{ route('checkout') }}" class="more">Оформить заказ</a>
                </div>
            	@else
            	<p>В корзине товаров нет!</p>
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
@section('scripts')
<script>
    var changeQtyUrl = '{{ route('cart.change-qty') }}';
    var reduceQtyUrl = '{{ route('cart.ajax-reduce') }}';
    var increaseQtyUrl = '{{ route('cart.ajax-increase') }}';
    var removeQtyUrl = '{{ route('cart.ajax-remove') }}';
    var inputQty = $('input.cart-input');
    var cartBlock = $('.cart__block_1');
    $(document).ready(function()
    {
        inputQty.change(function()
        {
            var qty = $(this).val();
            var id = $(this).data('id');
            var itemPrice = $(this).parent().parent().find('.item_price');
            console.log(itemPrice.html());
            if(parseInt(qty) > 0 && parseInt(qty) < 1001 && $.isNumeric(qty))
            {
                $.ajax({
                    url: changeQtyUrl,
                    data: { qty: qty, id:id, _token:token},
                    success: function(data) {
                        $('.total_price').html(data.totalPrice+' тг');
                        $('span.badge').html(data.totalQty);
                        itemPrice.html(parseInt(itemPrice.data('price'))*qty+' тг');
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
