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
            <form action="{{ route('feedback.edit', $model) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" name="name" value="{{ $model->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="text" class="form-control" name="email" value="{{ $model->email }}">
                </div>
                <div class="form-group">
                    <label for="avatar">Изображение</label>
                    <input type="file" name="avatar" class="form-control" title="{{ $model->avatar }}" placeholder="{{ $model->avatar }}">
                    @if($model->avatar)<img src="{{ Storage::exists($model->avatar) ? Storage::url($model->avatar) : URL::to('images/'.$model->avatar) }}" alt="">@else Нет фото @endif
                </div>
                <div class="form-group">
                    <label for="rating">Оценка</label>
                    <input type="text" class="form-control" name="rating" value="{{ $model->rating }}">
                </div>
                <div class="form-group">
                    <label for="link">Ссылка</label>
                    <input type="text" class="form-control" name="link" value="{{ $model->link }}">
                </div>
                <div class="form-group">
                    <label for="body">Содержание</label>
                    <textarea name="body" rows="20" class="form-control">{{ $model->body }}</textarea>
                </div>
                <div class="form-group">
                    <label for="excerpt">Краткое содержание</label>
                    <textarea name="excerpt" class="form-control" rows="10" class="form-control">{{ $model->excerpt }}</textarea>
                </div>
                <div class="form-group">
                    <label class="fancy-checkbox">
                        <input type="checkbox" class="activeCb" value="{{ $model->active }}" @if($model->active == 1) checked @endif>
                        <span>Опубликован</span>
                    </label>
                    <input type="hidden" name="active" value="{{ $model->active }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Обновить">
                </div>
            </form>
        </div>
    </div>
@endsection