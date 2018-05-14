<div class="product-bar">
    <ul>
        @foreach($tree as $category)
        <li>
            <a href="{{ route('category', $category) }}">
                <div class="left-bl">
                    <img src="{{ URL::asset('images/'.$category->icon) }}" alt="{{ $category->title }}">
                </div>
                <div class="middle-bl">
                    <span>{{ $category->title }}</span>
                </div>
                <div class="right-bl">
                    <img src="{{URL::asset('images/arrow-right-product-bar.svg')}}" alt="кухня">
                </div>

            </a>
            @if($category->has('children'))
            <ul class="second-dropdown">
                <?php $children = $category->children()->limit(6)->get();  ?>
                @foreach($children as $subcategory)
                <li>
                    <a href="{{ route('subcategory', [$subcategory->parent->slug, $subcategory]) }}">{{ $subcategory->title }}</a>
                    {{--@if($subcategory->has('children'))
                    <ul class="third-dropdown">
                        @foreach($subcategory->children as $subsubcategory)
                        <li><a href="#">{{ $subsubcategory->title }}</a></li>
                        @endforeach
                    </ul>
                    @endif--}}
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</div>