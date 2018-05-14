<div class="head">
    <div class="header">
        <div class="logo"><a href="/"><img src="{{ Storage::url('public/uploads/20150912_130123_902.png') }}"></a></div>
        <div class="qestion"><a href="{{ route('contact-form') }}" class="qe">Отправить онлайн заявку</a></div>
        <div class="contacts">
            <a href="mailto:{{ $siteemail }}">{{ $siteemail }}</a>
            {!! $sitephone !!}
        </div>
        <a href="{{ route('cart') }}">
            <div class="cartt">
            <span class="badge">{{ session()->has('cart') ? session()->get('cart')->totalQty : 0 }}</span>
            </div>
        </a>
        <div class="menu">
            <div class="menu-block">
                @foreach($mainPages as $page)
                <a href="{{ route($page->slug) }}" @if(request()->routeIs($page->slug)) style="border-bottom:0;" @endif >{{ $page->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="head-m">
    <div class="logo-m"><a href="/"><img src="{{ URL::to('upload/20150912_130123_902.png') }}"></a></div>
    <div class="cont-mob">
        <a href="mailto:#">{{ $siteemail }}</a><Br>
        {{ $sitephone2 }}
    </div>
    <a href="{{ route('cart') }}"><div class="cartt"></div></a>
</div>
<a href="#" onclick="openbox('box'); return false"><div class="menu-m">Меню сайта</div></a>
<div id="box" class="menu-m3" style="display: none;">
    <div class="hide" onclick="openbox('box'); return false"></div>
    @foreach($mainPages as $page)
    <a href="{{ route($page->slug) }}" @if(request()->routeIs($page->slug)) style="border-bottom:0;" @endif >{{ $page->title }}</a><br>
    @endforeach
</div>
<a href="tel:+77770905434"><div class="phone-mob"></div></a>