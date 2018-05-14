@extends('admin.layouts.master')
@section('title', 'Список записей')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Список записей</h1>
            <a class="btn btn-primary btn-sm" href="{{ route('post.create') }}" role="button">Создать запись</a>
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
                    <tr class="@if(!$model->active) italic-style @endif">
                        <th scope="row">{{ $model->id }}</th>
                        <td>{{ $model->title }}</td>
                        <td>{{ $model->slug }}</td>
                        <td>{!! str_limit($model->body, 300, '...') !!}</td>
                        <td>@if($model->image)<img src="{{ Storage::url($model->image) }}" alt="">@else Нет фото @endif</td>
                        <td>
                            <a href="{{ route('post.edit', $model->id) }}"><i class="lnr lnr-pencil"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('post.delete', $model->id) }}"><i class="lnr lnr-cross"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $models->links() }}
        </div>
    </div>
@endsection