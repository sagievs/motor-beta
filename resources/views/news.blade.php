@extends('layouts.master')
@section('title', $page->title)

@section('content')

<div class="content-main-block-inner">
    <div class="content-block">
        <div class="content-main">
            <div class="zag">{{ $page->title }}<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
                <div class="ssd">
                    @foreach($articles as $article)
                    <div class="ssd1">
                        <a href="{{ route('article', $article) }}">
                            <div class="ssd1-img" style="background: url( {{ Storage::url($article->thumbnail) }} ) center; background-size: cover;"></div>
                        </a>
                        {{ $article->created_at->format('j '.$monthes[$article->created_at->month].' Y') }}<br>
                        <div class="ssd-name" style="line-height: 15px;"><a href="{{ route('article', $article) }}">{{ $article->title }}</a></div>
                    </div>
                    @endforeach
                </div>
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
