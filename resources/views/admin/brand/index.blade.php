<x-app-layout>

    @if(session('message'))
        <div class="text-red-600 font-bold">
            {{ session('message') }}
        </div>
    @endif

    <div class="py-12 max-sm:py-6">
        <div class="w-full">
            @foreach($brands as $brand)
            <div class="p-8 mb-4 bg-white w-4/5 rounded-2xl max-sm:w-full mx-auto">
                <!-- compact('brand')は['brand' => $brand]と同じ意味 -->
                <!-- route('ルート名', パラメータ)でパラメータを受け渡せる -->
                <div class="flex justify-between font-semibold text-lg mb-2">
                    <!-- object-fitで長方形の画像が楕円になるのを防げる -->
                    <div class="flex items-center">
                        <img src="/storage/images/brands/{{ $brand->image }}" class="rounded-full w-12 h-12 object-cover">
                        <a href="{{ route('admin.product.index', $brand) }}" class="rounded-md px-3 py-2 text-blue-600">
                            {{$brand->name}}
                        </a>
                    </div>
                    <div class="flex items-center">
                        @can('admin',$brand)
                        <a href="{{ route('admin.brand.edit', $brand) }}" class="flex-1">
                            <x-primary-button class="bg-teal-700 max-sm:py-1 max-sm:px-3">編集</x-primary-button>
                        </a>
                        <form method="post" action="{{ route('admin.brand.destroy', $brand) }}" class="flex-2">
                            @csrf
                            @method('delete')
                            <x-primary-button class="bg-red-700 ml-2 max-sm:py-1 max-sm:px-3">削除</x-primary-button>
                        </form>
                        @endcan
                    </div>
                </div>
                
                <hr class="w-full">
                <p class="mt-4 p-4">
                    {{$brand->info}}
                </p>
                
                <div class="pl-2 text-sm font-semibold flex flex-row-reverse">
                    <!-- 削除されたユーザーがいるとAttempt to read property "avatar" on nullでエラーになるので??でデフォルトを反映させる -->
                    <img src="/storage/images/avatar/{{ $brand->admin->avatar ?? 'user_default.jpg'}}" class="rounded-full w-8 h-8 object-cover">
                    <p class="py-2 px-2">
                        {{$brand->created_at->diffForHumans()}} / {{$brand->admin->name??'匿名'}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-2 mb-4 mx-auto w-4/5">
            {{$brands->links()}}
        </div>
    </div>
</x-app-layout>