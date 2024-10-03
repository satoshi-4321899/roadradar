<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h1 class="font-semibold sm:text-xl max-sm:text-lg text-gray-800 py-4">
                <a href="{{ route('free.brands.show', $product->brand) }}" class="rounded-md sm:px-3 sm:py-2 text-black">
                    ブランド名：{{ $product->brand->name }}
                </a>
            </h1>
        </div>
    </x-slot>

    @if(session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 py-5">
        <div class="sm:px-20 mt-4">
            <div class="bg-white w-full rounded-2xl sm:px-10 sm:py-8 max-sm:py-4 shadow-lg hover:shadow-2xl transition duration-500">
                <div class="text-left sm:flex sm:justify-between">
                    <div>
                        <img src="/storage/images/products/{{ $product->image }}"  class="rounded-md sm:w-1/2 sm:h-80 max-sm:w-60 max-sm:h-52 object-cover max-sm:mx-auto">
                    </div>
                    <div class="flex flex-col p-3">
                        <h2 class="sm:text-xl text-gray-700 font-semibold">
                            {{ $product->name }}
                        </h2>
                        <p class="text-gray-500 sm:whitespace-pre-line max-sm:text-sm truncate">
                            {{$product->info}}
                        </p>
                        <p class="text-gray-700 sm:mt-3 max-sm:text-sm">
                            ¥{{$product->price}}
                        </p>
                        <p class="text-gray-700 sm:mt-3 max-sm:text-sm">
                            在庫数：{{$product->stock}}
                        </p>
                        <p class="sm:mb-4 text-gray-700 sm:mt-3 max-sm:text-sm">
                            カテゴリー：<a href="{{ route('free.category.show', $product->category) }}">{{$product->category}}</a>
                        </p>
                        @if($product->stock == 0)
                            <button class="bg-red-600 rounded px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-red-700">
                                在庫なし
                            </button>
                        @else
                            <a href="{{ route('register') }}">
                                <button class="bg-gray-800 rounded px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-gray-700">
                                    会員登録後に商品を購入できます
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div>
                <h2 class="mt-8 font-semibold">関連する商品</h2>
                <ul class="sm:flex">
                    @foreach ($relations as $relation)
                        <li class="sm:w-1/3 rounded-2xl py-2 mb-3 hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in">
                            <a href="{{ route('free.product.show',$relation) }}" class="rounded-md text-black">
                                <img src="/storage/images/products/{{$relation->image}}" class="px-1 w-full h-48 max-sm:h-40 object-cover rounded-md">
                                <p>{{$relation->name}}</p>
                                <p class="text-gray-500 truncate">{{$relation->info}}</p>
                                <p>¥{{$relation->price}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-8">
                @if(count($product->comments) > 0)
                    <h2 class="font-semibold text-lg pl-2">コメント</h2>
                @endif
                @foreach ($product->comments as $comment)
                <div class="bg-white sm:w-3/4 rounded-2xl px-10 py-2 mb-3 shadow-lg whitespace-pre-line">
                    <p>{{$comment->body}}</p>
                    <div class="text-sm font-semibold flex flex-row-reverse">
                        <p> {{ $comment->user->name }} • {{$comment->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

