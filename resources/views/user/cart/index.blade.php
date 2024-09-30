<x-app-layout>
    <h1 class="mt-7 mx-7 text-2xl font-semibold rounded-md max-sm:text-lg">ショッピングカート</h1>

    @if($cartProducts->isEmpty())
        <p class="mt-7 mx-7 text-2xl font-semibold rounded-md max-sm:text-lg">カート内に商品がありません</p>
    @else
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        <ul class="mt-3 mx-7">
            @foreach($cartProducts as $cartProduct)
                <li class="sm:flex mb-8">
                    <div>
                        <img src="/storage/images/products/{{$cartProduct->image}}" class="sm:w-96 sm:h-64 max-sm:w-64 max-sm:h-36 object-cover rounded-md">
                    </div>
                    <div class="sm:px-8">
                        <a href="{{ route('user.product.show',$cartProduct) }}" class="rounded-md text-black text-lg font-semibold max-sm:text-sm">
                            <p>商品名: {{ $cartProduct->name }}</p>
                        </a>
                        <p class="rounded-md text-gray-400 truncate max-sm:text-xs">{{$cartProduct->info}}</p>
                        <p class="max-sm:text-xs">¥{{ $cartProduct->price }}</p>
                        <p class="max-sm:text-xs">数量: {{ $cartProduct->pivot->quantity }}</p>
                        <p class="max-sm:text-xs">金額: {{ $cartProduct->pivot->amount }}円</p>
                        <form action="{{ route('cart.destroy', $cartProduct->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded border border-transparent rounded-md font-semibold text-sm text-red-600 hover:text-red-900 transition duration-300 ease-out hover:ease-in">削除</button>
                        </form>
                    </div>
                </li>
                <div class="flex justify-center">
                    <hr class="border mb-8 w-full">
                </div>
            @endforeach
            <div class="flex flex-col items-end sm:pr-5">
                <strong class="sm:text-xl max-sm:text-lg">合計金額：{{ $totalAmount }}円</strong>
                <a href="{{ route('order.form') }}" class="bg-gray-600 w-32 text-center px-4 py-2 border border-transparent rounded-md font-semibold text-white text-sm hover:bg-gray-800 transition duration-300 ease-out hover:ease-in">
                    注文手続きへ
                </a>
            </div>
        </ul>
        <div class="flex justify-center">
            <hr class="border mt-5 w-11/12">
        </div>
    @endif
</x-app-layout>