<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ご注文が完了しました</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <h1>{{ $name }}様</h1>
    <p>ご購入いただいた商品</p>
    @foreach ($cartProducts as $product)  
        <div class="px-5">
            <p>{{ $product->name }}</p>
            <p>¥{{ $product->price }}</p>
            <p>数量：{{ $product->pivot->quantity }}</p>
            <p>金額：{{ $product->pivot->amount }}円</p>
        </div>  
        <hr>
    @endforeach
    </ul>
    <div>
        <p>合計金額：<strong>{{ $totalAmount }}円</strong></p>
        <p>お支払い方法：{{ $payment_method }}</p>
        <p>お届け先：{{ $address }}</p>
        <p>ご連絡先：{{ $phone_number }}</p>
    </div>
</body>
</html>