<x-app-layout>

    <x-slot name="header">
        <div class="text-right">
            <div class="flex justify-between">
                <div class="flex">
                    <img src="/storage/images/brands/{{ $brand->image }}"  class="rounded-full w-12 h-12 object-cover max-sm:w-10 max-sm:h-10">
                    <h1 class="rounded-md px-3 py-2 text-black font-semibold text-lg max-sm:text-sm">
                        {{ $brand->name }}
                    </h1>
                </div>
                <!-- <p class="text-left">
                    ブランド詳細：{{ $brand->info }}
                </p> -->
                @can('admin',$brand)
                <a href="{{ route('admin.product.create', $brand) }}" class="rounded-md px-3 py-2 text-black max-sm:text-sm">
                    商品登録へ
                </a>
                @endcan
            </div>
        </div>
    </x-slot>

    @if(session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif
    <div class="w-3/5 pb-4 ">
        @foreach($products as $product)
        <div class="mt-4 px-4 bg-white w-4/5 max-sm:w-full rounded-2xl mx-auto">
            <h1 class="p-4 text-lg font-semibold flex">
                <img src="/storage/images/products/{{ $product->image }}"  class="rounded-full w-12 h-12 object-cover">
                <a href="{{ route('admin.product.show',$product) }}" class="rounded-md px-3 py-2 text-blue-600">
                    {{$product->name}}
                </a>
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$product->info}}
            </p>
            <p class="mt-4 p-4">
                ¥{{$product->price}}
            </p>
            <div class="pl-2 text-sm font-semibold flex flex-row-reverse">
                <img src="/storage/images/avatar/{{ $brand->admin->avatar ?? 'user_default.jpg'}}" class="rounded-full w-8 h-8 object-cover">
                <p class="py-2 px-2">
                    {{$product->created_at->diffForHumans()}} / {{$brand->admin->name??'匿名'}} 
                </p>
            </div>
        </div>
        @endforeach
        <div class="w-4/5 mt-2 mx-auto">
            {{$products->links()}}
        </div>
    </div>
</x-app-layout>