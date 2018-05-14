@extends('admin.layouts.master')
@section('title', 'Список записей')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Список записей</h1>
            <a class="btn btn-primary btn-sm" href="{{ route('page.create') }}" role="button">Создать запись</a>
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
                    <th>Псевдоним</th>
                    <th>Контент</th>
                    <th>Путь изображение</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $model)
                    <tr id="{{ $model->id }}" class="@if(!$model->ismain) italic-style @endif">
                        <th scope="row">{{ $model->id }}</th>
                        <td>{{ $model->title }}</td>
                        <td>{{ $model->slug }}</td>
                        <td>@if(!empty($model->body)) Контент есть @else Контент пустой @endif</td>
                        <td>@if($model->image)<img src="{{ Storage::exists($model->image) ? Storage::url($model->image) : URL::to('images/'.$model->image) }}" alt="">@else Нет фото @endif</td>
                        <td>
                            <a href="{{ route('page.edit', $model->id) }}"><i class="lnr lnr-pencil"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('page.delete', $model->id) }}"><i class="lnr lnr-cross"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $models->links() }}
        </div>
    </div>
@endsection