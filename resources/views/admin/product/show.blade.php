<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex">
                <img src="/storage/images/brands/{{ $product->brand->image }}"  class="rounded-full w-12 h-12 object-cover max-sm:w-10 max-sm:h-10">
                <a href="{{ route('admin.product.index', $product->brand) }}" class="rounded-md px-3 py-2 text-black font-semibold text-lg max-sm:text-sm">
                    {{$product->brand->name}}
                </a>
            </div>
            <!-- モデルで定義したリレーションで$product->brandが使用できる -->
            <a href="{{ route('admin.product.index',$product->brand) }}" class="rounded-md px-3 py-2 text-black max-sm:text-sm">
                {{$product->brand->name}}の商品一覧へ
            </a>
        </div>
    </x-slot>

    @if(session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 max-sm:px-0 pb-4">
        <div class="mx-4 sm:p-8 max-sm:mx-0">
            <div class="px-10 mt-4 max-sm:px-0">

                <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="flex justify-between mb-2">
                        <div class="flex items-center">
                            <img src="/storage/images/products/{{ $product->image }}"  class="rounded-full w-12 h-12 object-cover max-sm:w-10 max-sm:h-10">
                            <h2 class="text-lg text-gray-700 font-semibold mb-2 px-3 py-2 max-sm:text-sm">
                                {{ $product->name }}
                            </h2>
                        </div>
                        <div class="flex items-center">
                            <a href="{{route('admin.product.edit',$product)}}">
                                <x-primary-button  class="bg-teal-700 max-sm:py-1 max-sm:px-3">編集</x-primary-button>
                            </a>
                            <form method="post" action="{{ route('admin.product.destroy', $product) }}" class="">
                                @csrf
                                @method('delete')
                                <x-primary-button class="bg-red-700 ml-2 max-sm:py-1 max-sm:px-3">削除</x-primary-button>
                            </form>
                        </div>
                    </div>
                    <hr class="w-full">
                    <p class="text-gray-600 whitespace-pre-line max-sm:text-xs">
                        商品詳細：{{$product->info}}
                    </p>
                    <p class="text-gray-600 whitespace-pre-line max-sm:text-xs">
                        価格：¥{{$product->price}}
                    </p>
                    <p class="text-gray-600 whitespace-pre-line max-sm:text-xs">
                        在庫数：{{$product->stock}}
                    </p>
                    <p class="mb-4 text-gray-600 whitespace-pre-line max-sm:text-xs">
                        カテゴリー：{{$product->category}}
                    </p>
                    <div class="text-sm font-semibold flex flex-row-reverse">
                        <img src="/storage/images/avatar/{{ $product->brand->admin->avatar ?? 'user_default.jpg'}}" class="rounded-full w-8 h-8 object-cover">
                        <p class="py-2 px-2 max-sm:text-xs"> {{$product->created_at->diffForHumans()}} / {{$product->brand->admin->name??'匿名'}}</p>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
