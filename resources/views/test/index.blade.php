{{--<ul>
    @foreach($tree as $category)
    <li>
        <span>{{ $category->id }} {{ $category->title }}</span>
        @if($category->has('children'))
        <ul class="second-dropdown">
            @foreach($category->children as $subcategory)
            <li>
            {{ $subcategory->id }} {{ $subcategory->title }}
                @if($subcategory->has('children'))
                <ul class="third-dropdown">
                    @foreach($subcategory->children as $subsubcategory)
                    <li>{{ $subsubcategory->id }} {{ $subsubcategory->title }}</li>
                    @if($subsubcategory->has('children'))
                    <ul class="fourth-dropdown">
                        @foreach($subsubcategory->children as $subsubsubcategory)
                        <li>{{ $subsubsubcategory->id }} {{ $subsubsubcategory->title }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>--}}

<form action="{{ route('form') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input name="name" class="name" type="text" placeholder="Имя" required="/">

    <input name="phone" class="phone" type="text" placeholder="Ваш номер телефона" required="/">

    <input name="email" class="mail" type="text" placeholder="Почта" required="/">

    <input type="file" name="image" class="phone">

    {!! Recaptcha::render([ 'lang' => 'ru' ]) !!}

    <input type="submit" value="Отправить">
</form>