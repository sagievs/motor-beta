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
            <form action="{{ route('promo.edit', $model) }})" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название записи</label>
                    <input type="text" class="form-control" name="title" value="{{ $model->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control" title="{{ $model->image }}" placeholder="{{ $model->image }}">
                    @if($model->image)<img src="{{ Storage::exists($model->image) ? Storage::url($model->image) : URL::to('images/'.$model->image) }}" alt="">@endif
                </div>
                <div class="form-group">
                    <label for="thumbnail">Миниатюра</label>
                    <input type="file" name="thumbnail" class="form-control" title="{{ $model->thumbnail }}" placeholder="{{ $model->thumbnail }}">
                    @if($model->thumbnail)<img src="{{ Storage::exists($model->thumbnail) ? Storage::url($model->thumbnail) : URL::to('images/'.$model->thumbnail) }}" alt="">@endif
                </div>
                <div class="form-group">
                    <label for="percent">Скидка (%, в процентах)</label>
                    <input type="text" class="form-control" name="percent" value="{{ $model->percent }}">
                </div>
                <div class="form-group">
                    <label for="body">Контент записи</label>
                    <textarea name="body" id="body" rows="20" class="form-control">{{ $model->body }}</textarea>
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