<div class="footer">
    <div class="foot">
        <div class="f1">
            {{ $sitephone2 }}
            <br><a href="mailto:#">{{ $siteemail }}</a><br>© {{ date('Y') }} {{ $sitename }}
        </div>
        <div class="f2">
            @foreach($mainPages as $page)
            <a href="{{ route($page->slug) }}" @if(request()->routeIs($page->slug)) style="border-bottom:0;" @endif >{{ $page->title }}</a>
            @endforeach
        </div>
        <div class="f3">
            <a href="{{ route('cart') }}" class="qe">Отправить онлайн заявку</a>
            <a href="http://smartsol.kz/" target="_blank"><div class="smartsol">Сайт разработали -</div></a>
        </div>
    </div>
</div>