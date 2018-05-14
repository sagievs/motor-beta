@if(request()->routeIs('article'))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('news') }}">Новости</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
    </ol>
</nav>
@elseif(request()->routeIs('category'))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item"><a href="/catalog">Каталог</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
</nav>
@elseif(request()->routeIs('promo.single'))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('promo') }}">Акции</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
</nav>
@elseif(request()->routeIs('subcategory'))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item"><a href="/catalog">Каталог</a></li>
        @if(!empty($category->parent->parent->parent))
        <li class="breadcrumb-item"><a href="{{ route('category', $category->parent->parent->parent) }}">{{ $category->parent->parent->parent->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subcategory', [$category->parent->parent->parent->slug, $category->parent->parent]) }}">{{ $category->parent->parent->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subcategory', [$category->parent->parent->slug, $category->parent]) }}">{{ $category->parent->title }}</a></li>
        @elseif(!empty($category->parent->parent))
        <li class="breadcrumb-item"><a href="{{ route('category', $category->parent->parent) }}">{{ $category->parent->parent->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subcategory', [$category->parent->parent->slug, $category->parent]) }}">{{ $category->parent->title }}</a></li>
        @elseif(!empty($category->parent))
        <li class="breadcrumb-item"><a href="{{ route('category', $category->parent->slug) }}">{{ $category->parent->title }}</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
</nav>
@elseif(request()->routeIs('product'))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item"><a href="/catalog">Каталог</a></li>
        @if(!empty($category->parent->parent->parent))
        <li class="breadcrumb-item"><a href="{{ route('category', $category->parent->parent->parent) }}">{{ $category->parent->parent->parent->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subcategory', [$category->parent->parent->parent->slug, $category->parent->parent]) }}">{{ $category->parent->parent->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subcategory', [$category->parent->parent->slug, $category->parent]) }}">{{ $category->parent->title }}</a></li>
        @elseif(!empty($category->parent->parent))
        <li class="breadcrumb-item"><a href="{{ route('category', $category->parent->parent) }}">{{ $category->parent->parent->title }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subcategory', [$category->parent->parent->slug, $category->parent]) }}">{{ $category->parent->title }}</a></li>
        @elseif(!empty($category->parent))
        <li class="breadcrumb-item"><a href="{{ route('category', $category->parent->slug) }}">{{ $category->parent->title }}</a></li>
        @endif
        <li class="breadcrumb-item"><a href="{{ route('subcategory', [$product->category->parent->slug, $product->category]) }}">{{ $product->category->title }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
</nav>
@else
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
    </ol>
</nav>
@endif