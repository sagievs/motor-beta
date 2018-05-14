@extends('admin.layouts.master')
@section('title', 'Список продуктов')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Список продуктов</h1>
            <a class="btn btn-primary btn-sm" href="{{ route('product.create') }}" role="button">Создать продукт</a>
            <br><br>
            @if(Session::has('flash_message'))
                <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Категория</th>
                    <th>Путь изображение</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $model)
                    <tr class="@if(!$model->active) italic-style @endif">
                        <th scope="row">{{ $model->id }}</th>
                        <td>{{ $model->title }}</td>
                        <td>{{ number_format($model->price, 0, ',', ' ') }} тг</td>
                        <td>{{ $model->category->title }}</td>
                        <td>@if($model->image)<img src="{{ Storage::url($model->image) }}" alt="">@else Нет фото @endif</td>
                        <td>
                            <a href="{{ route('product.edit', $model->id) }}"><i class="lnr lnr-pencil"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('product.delete', $model->id) }}"><i class="lnr lnr-cross"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $models->links() }}
        </div>
    </div>
    {{--<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Выгрузка через Excel</h1>
            <form action="{{ route('product.excel') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="file">Название файла</label>
                    <input type="text" name="file" class="form-control" placeholder="название_файла.xlsx">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Выгрузить">
                </div>
            </form>
        </div>
    </div>--}}
@endsection