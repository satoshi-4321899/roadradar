<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h1 class="font-semibold sm:text-xl max-sm:text-lg text-gray-800 py-4">
                <a href="{{ route('user.brands.show', $product->brand) }}" class="rounded-md sm:px-3 sm:py-2 text-black">
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
            <div class="bg-white w-full rounded-2xl sm:px-10 sm:py-8 shadow-lg hover:shadow-2xl transition duration-500">
                <div class="text-left sm:flex sm:justify-around">
                    <div>
                        <img src="/storage/images/products/{{ $product->image }}"  class="rounded-md sm:w-80 sm:h-80 max-sm:w-52 max-sm:h-52 object-cover max-sm:mx-auto">
                    </div>
                    <div class="flex flex-col p-3 min-w-80">
                        <h2 class="sm:text-xl text-gray-700 font-semibold">
                            {{ $product->name }}
                        </h2>
                        <p class="text-gray-500 sm:whitespace-pre-line max-sm:text-sm">
                            {{$product->info}}
                        </p>
                        <p class="text-gray-700 sm:mt-3 max-sm:text-sm">
                            ¥{{$product->price}}
                        </p>
                        <p class="text-gray-700 sm:mt-3 max-sm:text-sm">
                            在庫数：{{$product->stock}}
                        </p>
                        <p class="sm:mb-4 text-gray-700 sm:mt-3 max-sm:text-sm">
                            カテゴリー：<a href="{{ route('products.category.show', $product->category) }}">{{$product->category}}</a>
                        </p>
                        @if($isFavorited)
                            <!-- お気に入り解除ボタン -->
                            <form action="{{ route('favorite.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 rounded px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-red-700">お気に入り解除</button>
                            </form>
                        @else
                            <form method="post" action="{{route('favorite.store')}}">
                                @csrf
                                <input type="hidden" name='product_id' value="{{$product->id}}">
                                <x-primary-button>お気に入り登録</x-primary-button>
                            </form>
                        @endif
                        <div class="mt-3">
                            @if($product->stock == 0)
                                <button class="bg-red-600 rounded px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white hover:bg-red-700">在庫なし</button>
                            @else
                                <form method="post" action="{{route('cart.store')}}">
                                    @csrf
                                    <input type="hidden" name='product_id' value="{{$product->id}}">
                                    <div class="mb-1 max-sm:text-sm">
                                        <label for="">個数：</label>
                                        <input type="number" id="quantity" name="quantity" min="1" max="{{$product->stock}}" class="rounded-md h-9 w-20" required>
                                    </div>
                                    <x-primary-button>カートに追加</x-primary-button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="mt-8 font-semibold">関連する商品</h2>
                <ul class="sm:flex">
                    @foreach ($relations as $relation)
                        <li class="sm:w-1/3 rounded-2xl py-2 mb-3 hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in">
                            <a href="{{ route('user.product.show',$relation) }}" class="rounded-md text-black">
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
            <div class="mt-4 mb-12">
                <form method="post" action="{{route('comment.store')}}">
                    @csrf
                    <div class="flex flex-col mb-2">
                        <input type="hidden" name='product_id' value="{{$product->id}}">
                        <textarea name="body" class="bg-white sm:w-3/4 rounded-2xl px-4 mt-4 py-4 shadow-lg hover:shadow-2xl transition duration-500" id="body" cols="30" rows="3" placeholder="コメントを入力してください"></textarea>
                    </div>
                    <x-primary-button>コメントする</x-primary-button>  
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
