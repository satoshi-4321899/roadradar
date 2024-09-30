<x-guest-layout>
    <div class="sm:mx-4 p-5">
        <h1 class="text-xl max-sm:text-lg text-gray-700 font-semibold hover:underline cursor-pointer">
            お問い合わせ
        </h1>
        
        @if(session('message'))
            <div class="text-red-600 font-bold text-sm">
                {{ session('message') }}
            </div>
        @endif
        
        <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="md:flex items-center mt-5">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold leading-none mb-1 max-sm:text-sm">件名</label>
                    <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md max-sm:text-sm" id="title" value="{{old('title')}}" placeholder="Enter Title">
                </div>
            </div>
            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold leading-none mt-4 mb-1 max-sm:text-sm">お問い合わせ内容</label>
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md max-sm:text-sm" id="body" cols="30" rows="10">{{old('body')}}</textarea>
            </div>
            <div class="md:flex items-center">
                <div class="w-full flex flex-col">
                    <label for="email" class="font-semibold leading-none mt-4 mb-1 max-sm:text-sm">メールアドレス</label>
                    <input type="text" name="email" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md max-sm:text-sm" id="email" value="{{old('email')}}" placeholder="Enter Email">
                </div>
            </div>
            <div class="flex justify-center">
                <x-primary-button class="mt-5">
                    送信する
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>