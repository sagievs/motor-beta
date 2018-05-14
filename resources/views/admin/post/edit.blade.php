@extends('admin.layouts.master')
@section('title', 'Изменить запись '.$model->title)
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Изменить запись {{ $model->title  }}</h1>
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
            <form action="{{ route('post.edit', $model) }})" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название записи</label>
                    <input type="text" class="form-control" name="title" value="{{ $model->title }}">
                </div>
                <div class="form-group">
                    <label for="slug">Псевдоним</label>
                    <input type="text" class="form-control" name="slug" value="{{ $model->slug }}">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control" title="{{ $model->image }}" placeholder="{{ $model->image }}">
                    @if($model->image)<img src="{{ Storage::url($model->image) }}" alt="">@endif
                </div>
                <div class="form-group">
                    <label for="body">Контент записи</label>
                    <textarea name="body" id="body" rows="20" class="form-control withsm">{{ $model->body }}</textarea>
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
                    <label for="created_at">Дата</label>
                    <input type="text" class="form-control" name="created_at" value="{{ $model->created_at }}">
                </div>
                <div class="form-group">
                    <label class="fancy-checkbox">
                        <input type="checkbox" class="ismainCb" value="{{ $model->ismain }}" @if($model->ismain == 1) checked @endif>
                        <span>Показывать в странице "Статьи"</span>
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
                    <input type="submit" class="btn btn-primary" value="Обновить запись">
                </div>
            </form>
        </div>
    </div>
@endsection