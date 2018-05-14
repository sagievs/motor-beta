@if(request()->routeIs('subcategory'))
<div class="product__cont">
    <div class="product__img">
        <img src="{{URL::asset('images/'.$subcategory->image)}}" alt="продукты">
    </div>
    <p class="product__desc">{{ $subcategory->title }}</p>
    <div class="button product_button">
        <a href="{{ route('subcategory', [$subcategory->parent->slug, $subcategory]) }}" class="btn btn-secondary border-0 rounded btn-product">Далее</a>
    </div>
</div>
@else
<div class="product__cont">
    <div class="product__img">
        <img src="{{URL::asset('images/'.$subcategory->image)}}" alt="продукты">
    </div>
    <p class="product__desc">{{ $subcategory->title }}</p>
    <div class="button product_button">
        <a href="{{ route('subcategory', [$subcategory->parent->slug, $subcategory]) }}" class="btn btn-secondary border-0 rounded btn-product">Далее</a>
    </div>
</div>
@endif