<x-app-layout>
    <h1 class="mt-7 mx-7 text-2xl font-semibold rounded-md max-sm:text-lg">カテゴリー: {{ $category }}</h1>

    @if($products->isEmpty())
        <p class="mt-7 mx-7 text-2xl font-semibold rounded-md max-sm:text-lg">このカテゴリーには商品がありません。</p>
    @else
        <ul class="flex flex-wrap justify-around">
            @foreach($products as $product)
                <li class="w-72 flex-grow p-2 hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in">
                    <a href="{{ route('user.product.show',$product) }}" class="rounded-md text-black">
                        <img src="/storage/images/products/{{$product->image}}" class="w-72 h-64 object-cover rounded-md">
                        <p class="rounded-md text-black">{{$product->name}}</p>
                        <p class="rounded-md text-gray-400 truncate">{{$product->info}}</p>
                    </a>
                </li>
            @endforeach
            @php
                $count = count($products);
                $columns3 = 3;
                $columns4 = 4;
                $remainder3 = $count % $columns3;
                $remainder4 = $count % $columns4;
            @endphp

            @if ($remainder3 > 0)
                @for ($i = 0; $i < $columns3 - $remainder3; $i++)
                    <li class="w-72 flex-grow p-8 invisible"></li>
                @endfor
            @elseif ($remainder4 > 0)
                @for ($i = 0; $i < $columns4 - $remainder4; $i++)
                    <li class="w-72 flex-grow p-8 invisible"></li>
                @endfor
            @endif
        </ul>
        <div class="mt-2 mb-4 mx-7">
            {{$products->links()}}
        </div>
    @endif
    <div class="flex justify-center">
        <hr class="border mt-5 w-11/12">
    </div>
</x-app-layout>
