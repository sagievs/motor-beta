@extends('layouts.master')
@section('title', 'Оформление заказа')

@section('content')

<div class="content-main-block-inner">
    <div class="content-block">
        <div class="content-main">
            <div class="zag">Оформление заказа<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
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
                <form action="{{ route('checkout') }}" method="post">
                {{ csrf_field() }}
                Ваше имя<br />
                <input class="vvod" name="name" required="" size="35" type="text" /><br />
                Ваш телефон<br />
                <input class="vvod" name="phone" required="" size="35" type="text" /><br />
                Ваш e-mail<br />
                <input class="vvod" name="email" required="" size="35" type="email" /><br />
                Способ доставки<br />
                                <input type="radio" class="samo" value="самовывоз" name="delivery"> Самовывоз<br />
                <input type="radio" class="cour" value="курьер" name="delivery"> Доставка курьером<br />
                <input type="hidden" name="total" value="{{ $totalPrice }}">
                <div class="address-wrap">
                Адрес<br />
                <input type="text" class="vvod" name="address" required><br />
                </div>
                <p>Итого: <span class="total_price">{{ number_format($totalPrice, 0, ',', ' ') }} тг</span></p>
                <input class="qe subm" type="submit" value="Отправить" />&nbsp;
                </form>

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
    $(document).ready(function(){
        var samo = $('.samo');
        var address = $('input[name="address"]');
        samo.click(function(){
            if($(this).is(":checked"))
            {
                if(address.val() == '')
                {
                    address.val('None');
                    $('.address-wrap').hide();
                    console.log(address.val());
                }
            }
        })
        var courier = $('.cour');
        courier.click(function(){
            if($(this).is(":checked"))
            {
                address.val('');
                $('.address-wrap').show();
            }
        })
    });
</script>
@endsection
