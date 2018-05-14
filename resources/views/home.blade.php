@extends('layouts.master')
@section('title', $page->title)

@section('content')

<div class="slider-block">
	<div class="slider slider3">
		<div class="sliderContent">
            @foreach($homeSlides as $slide)
            <div class="item" style="background:url({{ Storage::url($slide->image) }}) center top no-repeat;"></div>
            @endforeach
		</div>
	</div>
</div>
<div class="brands-main-block">
	<div class="brands-main">
		<ul id="flexiselDemo1">
			<li><img src="{{ URL::to('img/2.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/4.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/5.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/6.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/7.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/8.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/9.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/10.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/12.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/13.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/16.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/19.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/21.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/24.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/25.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/26.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/27.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/29.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/32.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/33.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/34.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/35.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/36.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/37.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/38.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/39.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/40.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/41.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/43.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/44.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/45.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/46.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/48.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/52.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/54.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/55.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/56.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/57.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/58.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/59.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/60.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/61.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/62.jpg') }}" /></li>
			<li><img src="{{ URL::to('img/63.jpg') }}" /></li>                                  
		</ul>
	</div>
</div>
<div class="content-main-block">
	<div class="content-block">
		<div class="content-main">
            <div class="about-block">
                <div class="about-block-text">
                        <div class="zag-main">О компании</div>
                        <p>
	Рады приветствовать Вас на сайте нашей компании, и будем надеяться, что Вы найдете у нас то, что ищите.</p>
<p>
	На рынке Казахстана мы трудимся уже довольно давно, и за это время смогли зарекомендовать себя как успешно, динамично развивающаяся компания, с большим количеством довольных клиентов, которые теперь обслуживаются только у нас. Только у нас индивидуальный подход к каждому клиенту. Отличная команда из первоклассных специалистов не оставит Вас равнодушными!</p>

                </div>
            </div>
            <div class="news-block-main">
            	<div class="new-block">
            		<div class="zag-news-main">Внимание, Акция!</div>
					<?php setlocale(LC_ALL, 'ru_RU.UTF-8'); ?>
                        <div class="new-date-main">{{ strftime("%d %b %Y", strtotime($promo->created_at)) }}</div>
                        <div class="new-anons-main">Внимание Акция! На все масла скидка! Замена всех фильтров и моторного масла производится бесплатно! Замена масла и спецжидкостей на Японские и Европейские автомобили. Оригинальные масла в огромном ассортименте. Цены дилерские, ниже рыночных, звоните и сравните! Гарантируем! Прямые поставки!</div>
                        <a href="{{ route('promo') }}" class="more">Подробнее</a>
            	</div>
            </div>
            @include('partials.articles-home')
			<div class="ssd">
				<div class="popular-zag">Видеоархив</div>
				<div class="ssd1">
						<div class="ssd1-video"><iframe width="100%" height="180" src="https://www.youtube.com/embed/BzwTlJkOfKY" frameborder="0" allowfullscreen></iframe></div>
					<br>
				</div>
				<div class="ssd1">
						<div class="ssd1-video"><iframe width="100%" height="180" src="https://www.youtube.com/embed/HeEDJ3uqRsg" frameborder="0" allowfullscreen></iframe></div>
					<br>
				</div>
				<div class="ssd1">
						<div class="ssd1-video"><iframe width="100%" height="180" src="https://www.youtube.com/embed/olfSIB1Awps" frameborder="0" allowfullscreen></iframe></div>
					<br>
				</div>
			</div>
            <div class="popular-block">
	<div class="popular-zag">Популярные товары</div>
	<center>
			@foreach($hitProducts as $product)
			<div class="t1">
				<div class="t1-img"><a href="{{ route('product', [$product->category, $product]) }}"><img src="{{ Storage::url($product->image) }}" width="230" /></a></div>
				<div class="t1-name"><a href="{{ route('product', [$product->category, $product]) }}">{{ $product->title }}</a></div>
				<div class="t1-more"><a href="#" class="atoc" data-id="{{ $product->id }}">В корзину</a></div>
			</div>
			@endforeach
	</center>
</div>
            <div class="rekomenduem-block">
	<div class="popular-zag">Мы рекомендуем</div>
	<center>
		@foreach($recProducts as $product)
		<div class="t2">
			<div class="t1-img"><a href="{{ route('product', [$product->category, $product]) }}"><img src="{{ Storage::url($product->image) }}" width="230" /></a></div>
			<div class="t1-name"><a href="{{ route('product', [$product->category, $product]) }}">{{ $product->title }}</a></div>
			<div class="t1-more"><a href="#" class="atoc" data-id="{{ $product->id }}">В корзину</a></div>
		</div>
		@endforeach
	</center>
</div>
            <div class="map-block">
				<div class="map-zag">Мы на карте</div>
				<div class="map">
					<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=-p1ywcvKFRlY_T6ZWw2jHMu38rdcDAJD&width=100%&height=300"></script>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('scripts')
<script>
$(document).on('click', '.atoc', function () {
        var id = $(this).data('id');
        $.ajax({
            url: addToCartUrl,
            data: {id: id, _token: token},
            success: function (data) {
                if (!data) alert('Ошибка');
                var badge = $('.badge');
                badge.html(data);
            },
            error: function () {
                alert('Ошибка');
            }
        })
        return false;
    });
</script>
@endsection
