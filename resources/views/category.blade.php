@extends('layouts.master')
@section('title', $category->title)

@section('content')

<div class="content-main-block-inner">
	<div class="content-block">
		<div class="content-main">
            <div class="zag">{{ $category->title }}<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
           		 @if(!empty($categories))
            	<div class="cc">
            		@foreach($categories as $category)
            		<div class="t3">
            			<div class="t3-img" style="height:110px !important;">
            				<a href="{{ route('category', $category) }}"><img src="{{ Storage::url($category->image) }}" width="180" /></a>
            			</div>
            			<div class="t3-name">
            				<a href="{{ route('category', $category) }}" class="ss5">{{ $category->title }}</a>
        				</div>
        			</div>
        			@endforeach
            	</div>
				{{ $categories->links() }}
            	@elseif(!empty($products))
				<div class="cc">
            		@foreach($products as $product)
            		<div class="t1">
						<div class="t1-img"><a href="{{ route('product', [$product->category, $product]) }}"><img src="{{ Storage::url($product->image) }}" /></a></div>
						<div class="t1-name"><a href="{{ route('product', [$product->category, $product]) }}">{{ $product->title }}</a></div>
						<div class="t1-more">
							<a href="#" class="atoc" data-id="{{ $product->id }}">В корзину</a>
						</div>
					</div>
        			@endforeach
            	</div>
				{{ $products->links() }}
            	@else
				<p>Данный раздел находится в наполнении</p>
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
