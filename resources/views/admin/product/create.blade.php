@extends('admin.layouts.master')
@section('title', 'Создание нового продукта')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Новый продукт</h1>
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
            <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название продукта</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="body">Контент продукта</label>
                    <textarea name="body" rows="20" class="form-control withsm"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="metatitle">SEO Название</label>
                    <textarea name="metatitle" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="keywords">SEO Ключевые слова</label>
                    <textarea name="keywords" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">SEO Описание</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="ismain">Рекомендованный?</label>
                    <select name="ismain" class="form-control">
                        <option value=0>Нет</option>
                        <option value=1>Да</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ishit">Популярный</label>
                    <select name="ishit" class="form-control">
                        <option value=0>Нет</option>
                        <option value=1>Да</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="active">Активный</label>
                    <select name="active" class="form-control">
                        <option value=0>Нет</option>
                        <option value=1>Да</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Создать продукт">
                </div>
            </form>
        </div>
    </div>
@endsection