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
    <h1 class="mt-5 mx-5 text-xl text-red-700 font-semibold">{{ $name }}様</h1>
    <p class="mt-2 mx-5 text-lg font-semibold">ご購入いただいた商品</p>
    <ul class="mt-3 mx-5">
    @foreach ($cartProducts as $product)
        <li class="flex mb-4">
            <div>
                <img src="{{ asset('storage/images/products/' . $product->image) }}" alt="product_image" class="w-60 h-36 object-cover rounded-md">
            </div>
            <div class="px-5">
                <p>{{ $product->name }}</p>
                <p>¥{{ $product->price }}</p>
                <p>数量：{{ $product->pivot->quantity }}</p>
                <p>金額：{{ $product->pivot->amount }}円</p>
            </div>
        </li>
        <div class="flex justify-center">
            <hr class="border mb-4 w-full">
        </div>
    @endforeach
    </ul>
    <div class="flex flex-col items-end pr-3">
        <p>合計金額：<strong>{{ $totalAmount }}円</strong></p>
        <p>お支払い方法：{{ $payment_method }}</p>
        <p>お届け先：{{ $address }}</p>
        <p>ご連絡先：{{ $phone_number }}</p>
    </div>
</body>
</html>