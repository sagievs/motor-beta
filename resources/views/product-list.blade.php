@extends('layouts.master')
@section('title', $category->title)
@section('keywords', $category->keywords)
@section('description', $category->description)
@section('content')

    <section id="block__about" class="subcategory common">

        <div class="container">
            <div class="block__about_r row">

                <div class="block__about__left col-lg-2 col-md-2 col-sm-2">

                    @include('partials.product-bar')

                    <div class="block__about__left3">
                        <div class="accordion accordion__left">
                            <div class="accordion_header">
                                <h3>По странам кухни<img src="{{URL::asset('images/up-arrow.svg')}}" alt="аккордеон">
                                </h3>
                            </div>
                            <div class="accordion_body">
                                {{-- id inputs should incrementing or increasing, in order to make checkboxs working --}}
                                {{-- id="" should me matched with label for ="" --}}
                                {{--<div class="first_body">
                                    <input type="checkbox" id="checkbox__id_1" class="checkbox except_checkbox"
                                           value="value"/>
                                    <label for="checkbox__id_1">Европейская</label>
                                    <ul class="last_body">
                                        <div class="last_body_child">
                                            <input type="checkbox" id="checkbox__id_2" class="checkbox regular_checkbox"
                                            name="country[]" value="Италия"/>
                                            <label for="checkbox__id_2">Италия</label>
                                        </div>
                                        <div class="last_body_child">
                                            <input type="checkbox" id="checkbox__id_fr" class="checkbox regular_checkbox" name="country[]" value="Франция" />
                                            <label for="checkbox__id_fr">Франция</label>
                                        </div>
                                    </ul>
                                </div>--}}
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_1" class="checkbox regular_checkbox"
                                    name="country[]" value="Италия" />
                                    <label for="checkbox__id_1">Италия</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_2" class="checkbox regular_checkbox"
                                    name="country[]" value="Франция" />
                                    <label for="checkbox__id_2">Франция</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_3" class="checkbox regular_checkbox"
                                    name="country[]" value="Дунганская" />
                                    <label for="checkbox__id_3">Дунганская</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_4" class="checkbox regular_checkbox"
                                    name="country[]" value="Корейская"/>
                                    <label for="checkbox__id_4">Корейская</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_5" class="checkbox regular_checkbox"
                                           name="country[]" value="Китайская"/>
                                    <label for="checkbox__id_5">Китайская</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_6" class="checkbox regular_checkbox"
                                           name="country[]" value="Казахская"/>
                                    <label for="checkbox__id_6">Казахская</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_7" class="checkbox regular_checkbox"
                                           name="country[]" value="Узбекская"/>
                                    <label for="checkbox__id_7">Узбекская</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id_8" class="checkbox regular_checkbox"
                                           name="country[]" value="Азербайджанская"/>
                                    <label for="checkbox__id_8">Азербайджанская</label>
                                </div>
                            </div>
                            <div class="accordion_header">
                                <h3>По направлениям<img src="{{URL::asset('images/up-arrow.svg')}}" alt="аккордеон">
                                </h3>
                            </div>
                            <div class="accordion_body">
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id1" class="checkbox regular_checkbox"
                                           name="type[]" value="для мяса"/>
                                    <label for="checkbox__id1">Для Мяса</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id2" class="checkbox regular_checkbox"
                                           name="type[]" value="донерная"/>
                                    <label for="checkbox__id2">Донерная</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id3" class="checkbox regular_checkbox"
                                           name="type[]" value="для выпечки"/>
                                    <label for="checkbox__id3">Для выпечки</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id4" class="checkbox regular_checkbox"
                                           name="type[]" value="для кондитерки"/>
                                    <label for="checkbox__id4">Для кондитерки</label>
                                </div>
                                <div class="first_body">
                                    <input type="checkbox" id="checkbox__id5" class="checkbox regular_checkbox"
                                           name="type[]" value="для пицерии"/>
                                    <label for="checkbox__id5">Для пицерии</label>
                                </div>

                            </div>


                        </div>
                    </div>

                    @include('partials.banner-sidebar')

                </div>

                <div class="block__about__right col-lg-10 col-md-10 col-sm-10">
                    @include('partials.breadcrumb')

                    <h2 class="secondary-text">{{ $category->title }}</h2>

                    <div class="sort__order">
                        <div class="sort__text">Сортировать</div>
                        <ul class="list-unstyled">
                            <li class="init">По возрастанию цены</li>
                            <li><a href="?price=desc">По возрастанию цены</a></li>
                            <li><a href="?price=asc">По убыванию цены</a></li>
                            <li><a href="?ishit=desc">По популярности</a></li>
                            <li><a href="?isnew=desc">По новинкам</a></li>
                        </ul>
                    </div>


                    <div class="subcategory__r row">
                        <div class="product-list">
                            @if($products->count() > 0)
                                @foreach($products as $product)
                                    <div class="special-cont cart-effect">
                                        <a href="{{ route('product', [$product->category->parent->slug, $product->category, $product]) }}">
                                            <img src="{{URL::asset('images/'.$product->thumbnail)}}"
                                                 alt="{{ $product->title }}">
                                        </a>
                                        <a href="{{ route('product', [$product->category->parent->slug, $product->category, $product]) }}"><p class="pr-desc">{{ $product->title }}</p></a>
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
                            @else
                                <p>К сожалению, у данной категории продуктов пока нет</p>
                            @endif
                        </div>
                    </div>

                    <div class="pagination-r row">

                        {{ $products->links() }}

                    </div>

                </div>

            </div>


        </div>


    </section>

    @include('partials.recomended')


@endsection

@section('scripts')
    <script type="text/javascript">
        var filterUrl = '{{ route('ajax.filter') }}';
        var id = '{{ $category->id }}';
        $(document).ready(function () {
            $("ul").on("click", ".init", function () {
                $(this).closest("ul").children('li:not(.init)').toggle();
            });

            var allOptions = $("ul").children('li:not(.init)');

            $("ul").on("click", "li:not(.init)", function () {
                allOptions.removeClass('selected');
                $(this).addClass('selected');
                $("ul").children('.init').html($(this).html());
                allOptions.toggle();
            });

            // filter products with Ajax
            $(document).on('click','.regular_checkbox',function() {
            // if($('.regular_checkbox').is(':checked') {

            var types = [];
            var countries = [];

            $('input[name="type[]"]').each(function()
            {
                if($(this).is(":checked"))
                {
                    types.push($(this).val());
                }
            })
            $('input[name="country[]"]').each(function()
            {
                if($(this).is(":checked"))
                {
                    countries.push($(this).val());
                }
            })

            // types = types.toString();

            $.ajax({
                url: filterUrl,
                data: { types: types, countries: countries, id: id, _token: token },
                method: 'post',
                success: function (data) {
                    if(!data.output) 
                    { 
                        $('.product-list').html('<div>Продуктов по этим данным нет!</div>') 
                        $('.pagination-r').addClass('hidden');
                    }
                    else {
                        $('.product-list').html(data.output);
                        console.log(data.count);
                        if(data.count == false) 
                        { 
                            $('.pagination-r').addClass('hidden'); 
                        }
                        else
                        {
                            $('.pagination-r').removeClass('hidden');
                        }
                    }
                    // console.log(data);
                },
                error: function () {
                    alert('Ошибка!');
                }
            })
            // alert(types);
            })

            /* $('.except_checkbox').click(function()
            {
                if (this.checked) {
                    $('.last_body_child').find('.checkbox').attr('checked', 'true');
                } else {
                    $('.last_body_child').find('.checkbox').attr('checked', 'false');
                }
            }) */
            $(document).on('change', 'input[type=checkbox]', function(e) {
                $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
                $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
                e.stopPropagation();
            });
        })
    </script>

@endsection
