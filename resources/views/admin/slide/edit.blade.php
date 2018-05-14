@extends('admin.layouts.master')
@section('title', 'Изменить слайд '.$model->title)
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Изменить слайд {{ $model->title  }}</h1>
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
            <form action="{{ route('slide.edit', $model) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Название слайда</label>
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
                    <label for="link"></label>
                    <input type="text" class="form-control" name="link" value="{{ $model->link }}">
                </div>
				<div class="form-group">
					<label for="active">Вид фото</label>
                    <select name="type" class="form-control">
                        <option value="slide">Слайд</option>
                        <option value="Магазин" @if($model->type == 'Магазин') selected @endif>Магазин</option>
						<option value="Склад" @if($model->type == 'Склад') selected @endif>Склад</option>
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
                    <input type="submit" class="btn btn-primary" value="Обновить слайд">
                </div>
            </form>
        </div>
    </div>
@endsection