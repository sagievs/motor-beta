@extends('layouts.master')
@section('title', $product->title)

@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="t4-block">
                <div class="t4-zag">{{ $product->title }}<br>
                    <a href="javascript:history.go(-1)" class="tts">« Вернуться назад</a>
                </div>
                <div class="tov-img">
                    <img src="{{ Storage::url($product->image) }}" width="230">
                    <br>
                    <br>
                    <a href="#" class="cart atoc" data-id="{{ $product->id }}">Добавить в корзину</a>
                    <br>
                </div>
                <div class="t4-text">
                {!! $product->body !!}
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
