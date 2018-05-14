@extends('admin.layouts.master')
@section('title', 'Изменить категорию '.$model->title)
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Изменить категорию {{ $model->title  }}</h1>
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
            <form action="{{ route('category.edit', $model) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" name="title" value="{{ $model->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Путь изображение</label>
                    <input type="file" name="image" class="form-control" title="{{ $model->image }}" placeholder="{{ $model->image }}">
                    @if($model->image)<img src="{{ Storage::url($model->image) }}" alt="">@endif
                </div>
                <div class="form-group">
                    <label for="parent">Родительская категория</label>
                    <select name="parent_id" class="form-control">
                        <option value="0" @if($model->parent_id !=0) selected @else @endif>Без родителя</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category == $model->parent) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="fancy-checkbox">
                        <input type="checkbox" class="activeCb" value="{{ $model->active }}" @if($model->active == 1) checked @endif>
                        <span>Активный</span>
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