<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h1 class="rounded-md text-black font-semibold text-lg max-sm:text-sm">
                商品登録フォーム
            </h1>
            <a href="{{ route('admin.product.index',$brand) }}" class="rounded-md text-black max-sm:text-sm">
                {{$brand->name}}の商品一覧へ
            </a>
        </div>
    </x-slot>
    <form action="{{ route('admin.product.post', $brand) }}" method="POST" enctype="multipart/form-data" class="flex items-center justify-center pb-4">
        @csrf
        <div class="w-1/2 max-sm:w-3/4">

            <div class="flex flex-col mt-8">
                <label for="name" class="font-semibold mt-4 max-sm:text-xs">商品名</label>
                <x-input-error :messages="$errors->get('name')"/>
                <input type="text" id="name" name="name" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs" required>
            </div>
    
            <div class="flex flex-col">
                <label for="info" class="font-semibold mt-4 max-sm:text-xs">商品詳細</label>
                <x-input-error :messages="$errors->get('info')"/>
                <textarea id="info" name="info" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs"></textarea>
            </div>
    
            <div class="flex flex-col">
                <label for="price" class="font-semibold mt-4 max-sm:text-xs">価格</label>
                <x-input-error :messages="$errors->get('price')"/>
                <input type="number" id="price" name="price" step="1" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs" required>
            </div>
    
            <div class="flex flex-col">
                <label for="stock" class="font-semibold mt-4 max-sm:text-xs">在庫</label>
                <x-input-error :messages="$errors->get('stock')"/>
                <input type="number" id="stock" name="stock" step="1" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs" required>
            </div>
    
            <div class="flex flex-col">
                <label for="category" class="font-semibold mt-4 max-sm:text-xs">カテゴリー</label>
                <x-input-error :messages="$errors->get('category')"/>
                <select id="category" name="category" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->value }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="flex flex-col">
                <label for="image" class="font-semibold mt-4 max-sm:text-xs">商品画像 （1MBまで）</label>
                <x-input-error :messages="$errors->get('image')"/>
                <div class="w-auto mb-3">
                    <input type="file" id="image" name="image" class="max-sm:text-xs">
                </div>
            </div>

            <div class="flex justify-center mt-5 mb-3">
                <x-primary-button class="px-auto">
                    登録する
                </x-primary-button>
            </div>
        </div>
    </form>
</x-app-layout>