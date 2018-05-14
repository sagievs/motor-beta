@extends('admin.layouts.master')
@section('title', 'Изменить продукт '.$model->title)
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Изменить продукт {{ $model->title  }}</h1>
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
            <form action="{{ route('product.edit', $model) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название продукта</label>
                    <input type="text" class="form-control" name="title" value="{{ $model->title }}">
                </div>
                <div class="form-group">
                    <label for="body">Контент продукта</label>
                    <textarea name="body" rows="20" class="form-control withsm">{{ $model->body }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Иображение</label>
                    <input type="file" name="image" class="form-control" title="{{ $model->image }}" placeholder="{{ $model->image }}">
                    @if($model->image)<img src="{{ Storage::url($model->image) }}" alt="">@endif
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="number" class="form-control" name="price" value="{{ $model->price }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $model->category_id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="metatitle">SEO Название</label>
                    <textarea name="metatitle" rows="5" class="form-control">{{ $model->metatitle }}</textarea>
                </div>
                <div class="form-group">
                    <label for="keywords">SEO Ключевые слова</label>
                    <textarea name="keywords" rows="5" class="form-control">{{ $model->keywords }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">SEO Описание</label>
                    <textarea name="description" rows="5" class="form-control">{{ $model->description }}</textarea>
                </div>
                <div class="form-group">
                    <label class="fancy-checkbox">
                        <input type="checkbox" class="ismainCb" value="{{ $model->ismain }}" @if($model->ismain == 1) checked @endif>
                        <span>Рекомендованный?</span>
                    </label>
                    <input type="hidden" name="ismain" value="{{ $model->ismain }}">
                </div>
                <div class="form-group">
                    <label class="fancy-checkbox">
                        <input type="checkbox" class="activeCb" value="{{ $model->active }}" @if($model->active == 1) checked @endif>
                        <span>Активный</span>
                    </label>
                    <input type="hidden" name="active" value="{{ $model->active }}">
                </div>
                <div class="form-group">
                    <label for="ishit">Популярный (0 = нет, 1 = да)</label>
                    <input type="text" name="ishit" class="form-control" value="{{ $model->ishit }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Обновить">
                </div>
            </form>
        </div>
    </div>
@endsection