@extends('admin.layouts.master')
@section('title', 'Новая запись')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Новая запись</h1>
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
            <form action="{{ route('detail.create') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="key">Ключ</label>
                    <input type="text" class="form-control" name="key">
                </div>
                <div class="form-group">
                    <label for="value">Значение</label>
                    <input type="text" class="form-control" name="value">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Создать запись">
                </div>
            </form>
        </div>
    </div>
@endsection