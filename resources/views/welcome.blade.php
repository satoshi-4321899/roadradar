<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav class="flex justify-between">
            @if (Route::has('login'))
                @auth
                <div class="m-3 shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-logo/>
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="mr-10">
                        トップページへ
                    </a>
                </div>
                @else
                <div class="m-3 shrink-0 flex items-center max-sm:m-1">
                    <a href="{{ route('user.free') }}">
                        <x-logo/>
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="mr-10 max-sm:mr-3 max-sm:text-xs">
                        ログイン
                    </a>
                    <a href="{{ route('register') }}" class="mr-10 max-sm:mr-3 max-sm:text-xs">
                        会員登録
                    </a>
                    <a href="{{ route('contact.create') }}" class="mr-10 max-sm:mr-3 max-sm:text-xs">
                        お問い合わせ
                    </a>
                </div>
                @endauth
            @endif
        </nav>
        <hr>
        <div class="flex flex-col justify-center text-center h-60">
            <h1 class="font-sans text-bold text-4xl max-sm:text-2xl">
                <a href="/">
                    Road Radar
                </a>
            </h1>
            <p class="font-mono text-gray-400 max-sm:text-sm">
                ロードバイクに関する商品を取り扱っています
            </p>
            <div class="mt-3 max-sm:mt-2">
                <x-primary-button>
                    <a href="{{ route('free.main') }}">
                        未登録で商品を閲覧する
                    </a>
                </x-primary-button>
            </div>
        </div>
        <div class="flex items-center justify-center mb-10">
            <img src="{{ asset('storage/images/top/user.jpg') }}" alt="User_Top">
        </div>
        <div class="text-center">
            <h2 class="font-sans text-bold text-2xl max-sm:text-xl">新着商品</h1>
            <p class="text-gray-400 max-sm:text-sm">新着のおすすめ商品です</p>
            <div class="category-buttons mb-4 mt-5 max-sm:mt-1">
                @foreach ($categories as $category)
                    <button class="btn btn-primary ml-2 hover:text-gray-400 transition duration-300 ease-out hover:ease-in category-button max-sm:text-xs" data-category="{{ $category->value }}">
                        {{ ucfirst($category->value) }}
                    </button>
                @endforeach
            </div>
            @foreach($categories as $category)
                <div class="swiper category-carousel w-2/4 h-60 mt-5 mb-5 max-sm:mt-2 max-sm:mb-2 max-sm:h-52 max-sm:w-full" id="carousel-{{ $category->value }}">
                    
                    <div class="swiper-wrapper">
                        
                        @foreach($productsByCategory[$category->value] as $product)
                            <div class="swiper-slide">
                                <a href="{{ route('free.product.show', $product) }}">
                                    <div class="flex flex-col items-center">
                                        <img src="{{ asset('storage/images/products/' . $product->image) }}" class="h-40 w-40 object-contain max-sm:h-28 max-sm:w-28" alt="{{ $product->name }}">
                                        <h3 class="max-sm:text-sm">{{ $product->name }}</h3>
                                        <p class="max-sm:text-sm text-gray-500 w-5/6 truncate">{{ $product->info }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            @endforeach
        </div>
        <hr>
        <footer class="flex justify-between">
            @if (Route::has('login'))
                @auth
                <div class="m-10 shrink-0 flex items-center">
                    <a class="text-2xl font-bold" href="{{ route('dashboard') }}">
                        RR
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="mr-10">
                        トップページへ
                    </a>
                </div>
                @else
                <div class="m-10 shrink-0 flex items-center max-sm:m-5">
                    <a class="text-2xl font-bold max-sm:text-xl" href="{{ route('user.free') }}">
                        RR
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                        ログイン
                    </a>
                    <a href="{{ route('register') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                        会員登録
                    </a>
                    <a href="{{ route('contact.create') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                        お問い合わせ
                    </a>
                </div>
                @endauth
            @endif
        </footer>
    </body>
</html>