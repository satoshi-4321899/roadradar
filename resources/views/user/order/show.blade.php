<x-app-layout>
    @if (!Session::has('message') || !Session::has('cartProducts') || !Session::has('totalAmount'))
        <script>
            window.location.href = "{{ route('dashboard') }}";
        </script>
    @else
        <h1 class="mt-7 mx-7 text-xl text-red-700 font-semibold max-sm:text-lg">{{ session('message') }}</h1>
        <p class="mt-3 mx-7 text-lg text-black font-semibold  max-sm:text-sm">今回購入された商品</p>
        <ul class="mt-3 mx-7 pb-5">
            @foreach(session('cartProducts') as $cartProduct)
                <li class="sm:flex mb-8 max-sm:mb-4">
                    <div>
                        <img src="/storage/images/products/{{$cartProduct->image}}" class="w-96 h-64  max-sm:w-64 max-sm:h-36 object-cover rounded-md">
                    </div>
                    <div class="px-8 max-sm:px-2 max-sm:py-2">
                        <a href="{{ route('user.product.show',$cartProduct) }}" class="rounded-md text-black text-lg max-sm:text-sm font-semibold">
                            <p>商品名: {{ $cartProduct->name }}</p>
                        </a>
                        <p class="rounded-md text-gray-400 truncate">{{$cartProduct->info}}</p>
                        <p>¥{{ $cartProduct->price }}</p>
                        <p>数量: {{ $cartProduct->pivot->quantity }}</p>
                        <p>金額: {{ $cartProduct->pivot->amount }}円</p>
                    </div>
                </li>
                <div class="flex justify-center">
                    <hr class="border mb-8 w-full max-sm:mb-4">
                </div>
            @endforeach
            <div class="flex justify-end pr-5 max-sm:pr-2">
                <strong class="text-xl max-sm:text-lg">合計金額：{{ session('totalAmount') }}円</strong>
            </div>
        </ul>
    @endif
</x-app-layout>
