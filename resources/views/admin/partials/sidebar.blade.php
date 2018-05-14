<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif"><i class="lnr lnr-home"></i> <span>Панель</span></a></li>
                <li><a href="{{ route('page.index') }}" class="@if(request()->routeIs('page.index')) active @endif"><i class="lnr lnr-file-empty"></i> <span>Страницы</span></a></li>
                <li><a href="{{ route('post.index') }}" class="@if(request()->routeIs('post.index')) active @endif"><i class="lnr lnr-pushpin"></i> <span>Статьи</span></a></li>
                {{--<li><a href="{{ route('minislide.index') }}" class="@if(request()->routeIs('minislide.index')) active @endif"><i class="lnr lnr-license"></i> <span>Минислайдер</span></a></li>--}}
                <li><a href="{{ route('slide.index') }}" class="@if(request()->routeIs('slide.index')) active @endif"><i class="lnr lnr-picture"></i> <span>Слайдер</span></a></li>
                <li><a href="{{ route('category.index') }}" class="@if(request()->routeIs('category.index')) active @endif"><i class="lnr lnr-layers"></i> <span>Категории</span></a></li>
                <li><a href="{{ route('product.index') }}" class="@if(request()->routeIs('product.index')) active @endif"><i class="lnr lnr-shirt"></i> <span>Товары</span></a></li>
                <li><a href="{{ route('order.index') }}" class="@if(request()->routeIs('order.index')) active @endif"><i class="lnr lnr-diamond"></i> <span>Заказы</span></a></li>
                <li><a href="{{ route('detail.index') }}" class="@if(request()->routeIs('detail.index')) active @endif"><i class="lnr lnr-cog"></i> <span>Настройки сайта</span></a></li>
                {{--<li><a href="{{ route('photo.index') }}" class="@if(request()->routeIs('photo.index')) active @endif"><i class="lnr lnr-picture"></i> <span>Изображении сайта</span></a></li>
                <li><a href="{{ route('advantage.index') }}" class="@if(request()->routeIs('advantage.index')) active @endif"><i class="lnr lnr-diamond"></i> <span>Приемущества</span></a></li>
                <li><a href="{{ route('city.index') }}" class="@if(request()->routeIs('city.index')) active @endif"><i class="lnr lnr-apartment"></i> <span>Города</span></a></li>--}}
            </ul>
        </nav>
    </div>
</div>