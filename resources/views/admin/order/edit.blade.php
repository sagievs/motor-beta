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
            <form action="{{ route('order.edit', $model->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="name" value="{{ $model->name }}">
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" name="phone" value="{{ $model->phone }}">
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="text" class="form-control" name="email" value="{{ $model->email }}">
                </div>
                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" name="address" value="{{ $model->address }}">
                </div>
                <div class="form-group">
                    <label for="payment">Способ оплаты</label>
                    <input type="text" class="form-control" name="payment" value="{{ $model->payment }}">
                </div>
                <div class="form-group">
                    <label for="delivery">Способ доставки</label>
                    <input type="text" class="form-control" name="delivery" value="{{ $model->delivery }}">
                </div>
                <div class="form-group">
                    <label for="total">Сумма</label>
                    <input type="text" class="form-control" name="total" value="{{ $model->total }}">
                </div>
                <div class="form-group">
                    <label class="fancy-checkbox">
                        <input type="checkbox" class="activeCb" value="{{ $model->active }}" @if($model->active == 1) checked @endif>
                        <span>Активный</span>
                    </label>
                    <input type="hidden" name="active" value="{{ $model->active }}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Обновить">
                </div>
            </form>
            <br>
            <br>
            <table>
                @if($model->products)
                <tr style="background-color: #f8f8f8;">
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Товар</b></td>
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Цена</b></td>
                </tr>
                @foreach($products->items as $product)
                <tr style="background-color: #f8f8f8;">
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $product['item']['title'] }} * {{ $product['qty']  }}</td>
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $product['item']['price']*$product['qty'] }}</td>
                </tr>
                @endforeach
                <tr style="background-color: #f8f8f8;">
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Итого</b></td>
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>{{ number_format($model->total, 0, ',', ' ') }} тг</b></td>
                </tr>
                @endif
            </table>
        </div>
    </div>
@endsection