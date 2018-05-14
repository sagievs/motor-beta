@component('mail::message')
# Заказ клиента {{ $input['name'] }}

@component('mail::table')
| Имя|Телефон|Почта|Сумма|Товары|Адрес|Способ оплаты|Доставка|
| ------------- |:-------------:| --------:| ------------- | ------------- |:-------------:| --------:| ------------- |
| {{ $input['name'] }}| {{ $input['phone'] }}|{{ $input['email'] }}|{{ $input['total'] }}| {{ $input['products'] }}| {{ $input['address'] }}|{{ $input['payment'] }}|{{ $input['delivery'] }}|

@endcomponent

@endcomponent
