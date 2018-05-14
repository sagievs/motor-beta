@extends('admin.layouts.master')
@section('title', 'Список записей')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Список записей</h1>
            <a class="btn btn-primary btn-sm" href="{{ route('detail.create') }}" role="button">Создать запись</a>
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
                    <th>Контент</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $model)
                    <tr>
                        <th scope="row">{{ $model->id }}</th>
                        <td>{{ $model->key }}</td>
                        <td>{!! $model->value !!}</td>
                        <td>
                            <a href="{{ route('detail.edit', $model->id) }}"><i class="lnr lnr-pencil"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('detail.delete', $model->id) }}"><i class="lnr lnr-cross"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $models->links() }}
        </div>
    </div>
@endsection