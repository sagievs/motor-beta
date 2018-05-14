@extends('admin.layouts.unauthorize')
@section('title', 'Авторизация')
@section('content')
    {{--<div class="row">--}}
        {{--<div class="panel-login">--}}
            {{--<div>--}}
                {{--<h1>Войти в систему</h1>--}}
                {{--@if(count($errors))--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<p>{{ $error }}</p>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--<form action="{{ route('admin.login') }}" method="post">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="email">E-mail</label>--}}
                        {{--<input type="text" class="form-control" name="email">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="password">Пароль</label>--}}
                        {{--<input type="password" class="form-control" name="password">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="submit" class="btn btn-primary" value="Войти">--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="header">
        <div class="logo text-center"><img src="{{ URL::to('admin/img/logo-dark.png') }}" alt="Admin panel Logo"></div>
        <p class="lead">Войти в систему</p>
    </div>
    @if(count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form class="form-auth-small" action="{{ route('admin.login') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="signin-email" class="control-label sr-only">Email</label>
            <input type="email" class="form-control" id="signin-email" name="email" placeholder="Введите почту">
        </div>
        <div class="form-group">
            <label for="signin-password" class="control-label sr-only">Пароль</label>
            <input type="password" class="form-control" id="signin-password" name="password" placeholder="Введите пароль">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Войти</button>
        <div class="bottom">
            <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Забыли пароль?</a></span>
        </div>
    </form>
@endsection