<x-app-layout>
    @if($orders->isEmpty())
    <h1 class="mt-7 mx-7 text-2xl font-semibold rounded-md  max-sm:text-xl">注文履歴がありません</h1>
    @else
        @foreach ($orders as $order)
            <h2 class="mt-7 max-sm:mt-4 mx-7 text-xl font-semibold rounded-md max-sm:text-lg">注文日：{{ date("Y年m月d日",strtotime($order->created_at)) }}</h2>
            <ul class="px-7">
                @foreach ($order->orderItems as $orderItem)
                    <li class="mt-4 max-sm:mt-2 sm:flex">
                        <div>
                            <img src="/storage/images/products/{{ $orderItem->product->image }}"  class="rounded-md w-56 h-40 object-cover">
                        </div>
                        <div class="sm:pl-3">
                            <a href="{{ route('user.product.show',$orderItem->product) }}" class="rounded-md text-black text-lg max-sm:text-md font-semibold">
                                <p>商品名: {{ $orderItem->product->name }}</p>
                            </a>
                            <p>数量: {{ $orderItem->quantity }}</p>
                            <p>価格: {{ $orderItem->price }}円</p>
                            <p>商品合計:{{ $orderItem->product_total}}円</p>
                        </div>
                    </li>
                @endforeach
                <p class="mt-3">合計金額：<strong>{{$order->total_amount}}</strong>円</p>
                <div class="flex justify-center">
                    <hr class="border mt-8 max-sm:mt-4 w-full">
                </div>
            </ul>
        @endforeach
    @endif
</x-app-layout>
