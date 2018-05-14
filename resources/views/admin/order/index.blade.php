@extends('admin.layouts.master')
@section('title', 'Список записей')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Список записей</h1>
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
                    <th>Сумма</th>
                    <th>Адрес</th>
                    <th>Дата</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php  setlocale(LC_ALL, 'ru_RU.UTF-8'); ?>
                @foreach($models as $model)
                    <tr class="@if(!$model->active) italic-style @endif">
                        <th scope="row">{{ $model->id }}</th>
                        <td>{{ $model->name }}</td>
                        <td>{{ number_format($model->total, 0, ',', ' ') }} тг</td>
                        <td>{{ $model->address }}</td>
                        <td>{{ $model->created_at->format('H:i') }}, {{ strftime("%d %B, %Y", strtotime($model->created_at)) }}</td>
                        <td>
                            <a href="{{ route('order.edit', $model->id) }}"><i class="lnr lnr-pencil"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('order.delete', $model->id) }}"><i class="lnr lnr-cross"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $models->links() }}
        </div>
    </div>
@endsection