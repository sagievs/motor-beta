@extends('admin.layouts.master')
@section('title', 'Создание нового приемущества')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Новое приемущество</h1>
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
            <form action="{{ route('advantage.create') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control">
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="product_id">ID Продукта</label>--}}
                    {{--<input type="number" class="form-control" name="product_id">--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="active">Активный</label>
                    <select name="active" class="form-control">
                        <option value=0>Нет</option>
                        <option value=1>Да</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Создать">
                </div>
            </form>
        </div>
    </div>
@endsection