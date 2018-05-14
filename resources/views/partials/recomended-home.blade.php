<section id="recommend">

        <div class="container">
            <div class="row">
                <h1 class="text-center w-100 main-text">Мы рекомендуем</h1>
                <div class="rec-slider col-md-12">
                    @foreach($recomended as $product)
                    <div class="rec-col col cart-effect col-lg-2">

                        <a class="rec-col__link" href="{{ route('product', [$product->category->parent->slug, $product->category, $product]) }}"><img src="{{URL::asset('images/'.$product->thumbnail)}}" alt="{{ $product->title }}"></a>
                        <div id="like-product" class="like-wrap rounded-circle">
                            <img src="{{URL::asset('images/like.svg')}}" alt="мы рекомендуем">
                        </div>
                        <a href="{{ route('product', [$product->category->parent->slug, $product->category, $product]) }}"><p class="pr-desc">{{ $product->title }}</p></a>
                        <div class="price-wrap">
                            <p>{{ number_format($product->price, 0, ',', ' ') }} тг</p>
                        </div>
                        <div id="img-product" class="cart-wrap rounded-circle atoc" data-id="{{ $product->id }}">
                            <img class="align-middle loc-center"
                                 src="{{URL::asset('images/shopping-cart.svg')}}" alt="корзина">
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>


    </section>