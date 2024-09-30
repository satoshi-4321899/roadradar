<x-app-layout>

    <div class="max-w-7xl sm:px-6 lg:px-8">
        <form method="post" action="{{ route('admin.brand.post') }}" enctype="multipart/form-data" class="flex items-center justify-center">
            @csrf
            <div class="w-3/4">
                <div class="mt-8">
                    <div class="flex flex-col">
                        <label for="name" class="font-semibold mt-4 max-sm:text-xs">ブランド名</label>
                        <x-input-error :messages="$errors->get('name')"/>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="info" class="font-semibold mt-4 max-sm:text-xs">ブランド基本情報</label>
                    <x-input-error :messages="$errors->get('info')"/>
                    <textarea name="info" id="info" cols="30" rows="5" class="w-auto py-2 border border-gray-300 rounded-md max-sm:py-1 max-sm:text-xs">{{ old('info') }}</textarea>
                </div>
                <div class="flex flex-col">
                    <label for="image" class="font-semibold mt-4 max-sm:text-xs">ブランド画像 （1MBまで）</label>
                    <x-input-error :messages="$errors->get('image')"/>
                    <div class="w-auto mb-3">
                        <input type="file" id="image" name="image" class="max-sm:text-xs">
                    </div>
                </div>
                <div class="flex justify-center mt-5 mb-5 max-sm:mt-2">
                    <x-primary-button>
                        登録する
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
