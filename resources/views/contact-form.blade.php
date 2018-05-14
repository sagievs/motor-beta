@extends('layouts.master')
@section('title', 'Онлайн заявка')

@section('content')

<div class="content-main-block-inner">
    <div class="content-block">
        <div class="content-main">
            <div class="zag">Онлайн заявка<br><a href="javascript:history.go(-1)">« Вернуться назад</a></div>
            <div class="t3-block">
                @if(count($errors))
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <form action="{{ route('contact-form') }}" method="post">
                {{ csrf_field() }}
                Ваше имя<br />
                <input class="vvod" name="name" required="" size="35" type="text" /><br />
                Ваш телефон<br />
                <input class="vvod" name="phone" required="" size="35" type="text" /><br />
                Ваш e-mail<br />
                <input class="vvod" name="email" required="" size="35" type="email" /><br />
                Ваше сообщение<br />
                <textarea name="message" required="" type="text"></textarea><br />
                <input class="qe subm" type="submit" value="Отправить" />&nbsp;
                </form>

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
