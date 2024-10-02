<x-app-layout>
    <x-slot name="header">
        <h1 class="rounded-md text-black font-semibold text-lg max-sm:text-sm">
            ブランド情報の編集
        </h1>
    </x-slot>

    <div class="w-full mx-auto sm:px-6 lg:px-8">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif
        <form method="post" action="{{ route('admin.brand.update',$brand) }}" enctype="multipart/form-data" class="flex items-center justify-center">
            @csrf
            @method('patch')
            <div class="w-3/4">
                <div class="mt-8">
                    <div class="flex flex-col">
                        <label for="name" class="max-sm:text-xs font-semibold">ブランド名</label>
                        <x-input-error :messages="$errors->get('name')"/>
                        <input type="text" name="name" id="name" value="{{ old('name',$brand->name) }}" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs">
                    </div>
                </div>
                <div class="flex flex-col mt-4">
                    <label for="info" class="max-sm:text-xs font-semibold">ブランド基本情報</label>
                    <x-input-error :messages="$errors->get('info')"/>
                    <textarea name="info" id="info" cols="30" rows="5" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs">{{ old('info',$brand->info) }}</textarea>
                </div>
                <div class="flex flex-col my-4">
                    <label for="image" class="max-sm:text-xs font-semibold">ブランド画像 （1MBまで）</label>
                    <x-input-error :messages="$errors->get('image')"/>
                    <div>
                        <input type="file" id="image" name="image" class="max-sm:text-xs">
                    </div>
                </div>
                <div class="flex justify-center mt-5 mb-3">
                    <x-primary-button class="px-auto">
                        更新する
                    </x-primary-button>
                </div>
                
            </div>
        </form>
    </div>

</x-app-layout>