<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
    <table>
        @if($order->products)
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
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>{{ number_format($order->total, 0, ',', ' ') }} тг</b></td>
        </tr>
        @endif
    </table>
    <br>
    <br>
    <table>
        @if($order->name)
        <tr style="background-color: #f8f8f8;">
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Имя</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ ucfirst($order->name) }}</td>
        </tr>
        @endif
        @if($order->email)
        <tr style="background-color: #f8f8f8;">
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Почта</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $order->email }}</td>
        </tr>
        @endif
        @if($order->phone)
        <tr style="background-color: #f8f8f8;">
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Телефон</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $order->phone }}</td>
        </tr>
        @endif
        @if($order->payment)
        <tr style="background-color: #f8f8f8;">
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Способ оплаты</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $order->payment }}</td>
        </tr>
        @endif
        @if($order->delivery)
        <tr style="background-color: #f8f8f8;">
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Способ доставки</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ ucfirst($order->delivery) }}</td>
        </tr>
        @endif
        @if($order->address)
        <tr style="background-color: #f8f8f8;">
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Адрес</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ ucfirst($order->address) }}</td>
        </tr>
        @endif
    </table>
</body>
</html>