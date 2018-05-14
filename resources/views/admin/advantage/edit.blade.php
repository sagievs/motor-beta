@extends('admin.layouts.master')
@section('title', 'Изменить приемущество '.$model->title)
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Изменить приемущество {{ $model->title  }}</h1>
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
            <form action="{{ route('advantage.edit', $model) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название приемущества</label>
                    <input type="text" class="form-control" name="title" value="{{ $model->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" class="form-control" title="{{ $model->image }}" placeholder="{{ $model->image }}">
                    @if($model->image)<img src="{{ Storage::url($model->image) }}" alt="">@endif
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="product_id">ID Продукта</label>--}}
                    {{--<input type="number" class="form-control" name="product_id" value="{{ $model->product_id }}">--}}
                {{--</div>--}}
                <div class="form-group">
                    <label class="fancy-checkbox">
                        <input type="checkbox" name="activeCb" value="{{ $model->active }}" @if($model->active == 1) checked @endif>
                        <span>Активный</span>
                    </label>
                    <input type="hidden" name="active" value="{{ $model->active }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Обновить приемущество">
                </div>
            </form>
        </div>
    </div>
@endsection