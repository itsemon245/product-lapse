<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $order->uuid }}</title>
</head>

<body>
    <h3>Order ID: {{ $order->uuid }}</h3>
    <h3>Status: {{ $order->status }}</h3>
    @if ($order->status == 'pending')
        <h3>Link to payment: {{ $order->link }}</h3>
    @elseif($order->status == 'completed')
        <div>Package has been enabled!</div>
        <div>
            شكراً لانضمامك لمنصة ProductLapse
            تم تفعيل باقتك بنجاح
        </div>
    @endif
</body>

</html>
