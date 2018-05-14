@extends('admin.layouts.master')
@section('title', 'Список записей')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Список записей</h1>
            {{--<a class="btn btn-primary btn-sm" href="{{ route('feedback.create') }}" role="button">Создать партнеры</a>--}}
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
                    <th>Изображение</th>
                    <th>Содержание</th>
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
                        {{--<td>@if($model->avatar)<img src="{{ Storage::exists($model->avatar) ? Storage::url($model->avatar) : URL::to('images/'.$model->avatar) }}" alt="">@else Нет фото @endif</td>--}}
                        <td>@if($model->avatar)<img class="rounded-circle" @if(strpos( $model->avatar, 'http') !== false ) src="{{ $model->avatar }}" @else src="{{URL::asset('images/'.$model->avatar)}}" @endif alt="отзывы"> @endif</td>
                        <td>{!! $model->link ? '<a href="'.$model->link.'">Перейти в профиль</a>' : 'Ссылка на соц. нет' !!}</td>
                        <td>@if(!empty($model->created_at)) {{ $model->created_at->format('H:i') }}, {{ strftime("%d %B, %Y", strtotime($model->created_at)) }} @else Не задан @endif</td>
                        <td>
                            <a href="{{ route('feedback.edit', $model->id) }}"><i class="lnr lnr-pencil"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('feedback.delete', $model->id) }}"><i class="lnr lnr-cross"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $models->links() }}
        </div>
    </div>
@endsection