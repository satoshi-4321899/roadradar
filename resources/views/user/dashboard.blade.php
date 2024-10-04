<x-app-layout>
    <div>
        <div class="font-bold font-mono text-center text-white bg-no-repeat bg-center py-40" style="background-image: url({{ asset('storage/images/top/top.jpg') }})">
            <h1 class="md:text-4xl">Road Radar</h1>
            <p>ロードバイクに関連する商品を取り扱っています</p>
        </div>
    </div>
    <div class="flex max-sm:justify-between">
        <div class="md:w-1/5 max-md:w-2/5 px-2">
            <h2 class="font-bold mt-5 max-sm:text-sm">商品カテゴリー</h2>
            <ul>
                @foreach($categories as $category)
                    <li class="text-black flex mt-1 hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in">
                        <img src="/storage/images/category/{{$category}}.png" class="rounded-full w-6 h-6 max-sm:w-4 max-sm:h-4 object-cover">
                        <a href="{{ route('products.category.show', $category) }}" class="max-sm:text-xs">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
            <h2 class="font-bold mt-5 max-sm:text-sm">ブランド一覧</h2>
            <ul>
                @foreach($brands as $brand)
                    <li class="text-black hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in truncate flex mt-1">
                        <img src="/storage/images/brands/{{$brand->image}}" class="rounded-full w-6 h-6 max-sm:w-4 max-sm:h-4 object-cover">
                        <a href="{{ route('user.brands.show', $brand) }}" class="max-sm:text-xs truncate">{{ $brand->name }}</a>
                    </li>
                @endforeach
            </ul>
            <h2 class="font-bold mt-7 max-sm:text-sm">価格別検索</h2>
            <form action="{{ route('user.product.search') }}" method="GET">
                @csrf
                <div class="flex flex-col mt-2">
                    <label for="category" class="max-sm:text-xs">カテゴリー</label>
                    <select id="category" name="category" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->value }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mt-2 max-sm:text-xs">
                    <label for="price">販売価格</label>
                    <x-input-error :messages="$errors->get('price')"/>
                    <input type="number" id="price-1" name="price-1" min="1" max="1000000" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs" required>
                    円から
                    <input type="number" id="price-2" name="price-2" min="1" max="1000000" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs" required>
                    円まで
                </div>
                <div class="flex justify-center mt-2">
                    <x-primary-button class="px-auto">
                        検索
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="md:w-4/5 max-md:w-full sm:px-5 max-sm:px-3">
            <div class="mt-5">
                <h2 class="font-bold sm:ml-2 max-sm:text-sm">フレーム・完成車新商品</h2>
                <ul class="md:flex md:flex-wrap">
                    @foreach($products as $product)
                        <li class="md:w-80 max-md:w-40 md:my-3 max-md:my-1 md:mr-5 max-md:mr-1 md:p-2 max-md:p-1 hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in">
                            <a href="{{ route('user.product.show',$product) }}" class="text-black">
                                <img src="/storage/images/products/{{$product->image}}" class="md:w-80 max-md:w-40 md:h-60 max-md:h-30 object-cover rounded-md">
                                <p class="truncate max-sm:text-xs">{{$product->name}}</p>
                                <p class="text-gray-500 truncate max-sm:text-xs">{{$product->info}}</p>
                                <p class="truncate max-sm:text-xs">¥{{$product->price}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-5">
                <h2 class="font-bold sm:mb-3 ml-2 max-sm:text-sm">アパレル新商品</h2>
                <ul class="md:grid md:grid-cols-5 md:grid-rows-2 md:gap-2 h-5/6 w-5/6">
                    @foreach($apparels as $index => $apparel)
                        @if($index === 0)
                            <li class="max-sm:hidden md:col-span-3 md:row-span-2 md:w-128 max-md:w-40 pr-2 md:p-2 max-md:p-1 hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in">
                                <a href="{{ route('user.product.show',$apparel) }}" class="text-black">
                                    <img src="/storage/images/products/{{$apparel->image}}" class="md:w-full md:h-4/5 max-md:w-40 max-md:h-30 object-cover rounded-md">
                                    <p class="truncate max-sm:text-xs mt-3">{{$apparel->name}}</p>
                                    <p class="text-gray-500 truncate max-sm:text-xs">{{$apparel->info}}</p>
                                    <p class="truncate max-sm:text-xs">¥{{$apparel->price}}</p>
                                </a>
                            </li>
                        @else
                            <li class="md:col-span-2 md:row-span-1 md:w-60 max-md:w-40 p-2 hover:bg-gray-200 rounded-md transition duration-300 ease-out hover:ease-in">
                                <a href="{{ route('user.product.show',$apparel) }}" class="text-black">
                                    <img src="/storage/images/products/{{$apparel->image}}" class="md:w-full md:h-3/5 max-sm:w-40 max-sm:h-30 object-cover rounded-md">
                                    <p class="truncate max-sm:text-xs mt-3">{{$apparel->name}}</p>
                                    <p class="text-gray-500 truncate max-sm:text-xs">{{$apparel->info}}</p>
                                    <p class="truncate max-sm:text-xs">¥{{$apparel->price}}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <hr class="border w-11/12">
    </div>
</x-app-layout>
