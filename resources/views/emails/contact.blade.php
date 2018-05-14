<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
    <table>
    @if($input['name'])
    <tr style="background-color: #f8f8f8;">
        <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Имя отправителя</b></td>
        <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $input['name'] }}</td>
    </tr>
    @endif
    @if($input['email'])
    <tr style="background-color: #f8f8f8;">
        <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Почта отправителя</b></td>
        <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $input['email'] }}</td>
    </tr>
    @endif
    @if($input['phone'])
    <tr style="background-color: #f8f8f8;">
        <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Телефон отправителя</b></td>
        <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $input['phone'] }}</td>
    </tr>
    @endif
    @if($input['message'])
    <tr style="background-color: #f8f8f8;">
        <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Сообщение</b></td>
        <td style='padding: 10px; border: #e9e9e9 1px solid;'>{{ $input['message'] }}</td>
    </tr>
    @endif
</table>
</body>
</html>