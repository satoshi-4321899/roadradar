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
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav class="flex justify-between">
            @if (Route::has('admin.login'))
                @auth('admin')
                <div class="m-3 shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-logo/>
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="mr-10">
                        トップページへ
                    </a>
                </div>
                @else
                <div class="m-3 shrink-0 flex items-center max-sm:m-1">
                    <a href="{{ route('admin') }}">
                        <x-logo/>
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin.login') }}" class="mr-10 max-sm:text-xs max-sm:mr-5">
                        ログイン
                    </a>
                    <a href="{{ route('admin.register') }}" class="mr-10 max-sm:text-xs max-sm:mr-5">
                        管理者登録
                    </a>
                </div>
                @endauth
            @endif
        </nav>
        <hr>
        <div class="flex flex-col justify-center text-center h-60 max-sm:h-52">
            <a href="/admin" class="font-sans text-bold text-4xl max-sm:text-2xl">
                Road Radar
            </a>
            <p class="font-mono text-gray-400 max-sm:text-sm">
                Road Radarの管理者用ページです
            </p>
            <div class="mt-3 max-sm:mt-2">
                <x-primary-button>
                    <a href="{{ route('admin.login') }}">
                        登録済みの方はこちら
                    </a>
                </x-primary-button>
                <x-primary-button>
                    <a href="{{ route('admin.register') }}">
                        未登録の方はこちら
                    </a>
                </x-primary-button>
            </div>
        </div>
        <div class="flex items-center justify-center mb-10">
            <img src="{{ asset('storage/images/admin/top.jpg') }}" alt="Admin_Top">
        </div>
        <hr>
        <footer class="flex justify-between">
            @if (Route::has('admin.login'))
                @auth('admin')
                <div class="m-10 shrink-0 flex items-center">
                    <a class="text-2xl font-bold" href="{{ route('admin.dashboard') }}">
                        RR
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="mr-10">
                        トップページへ
                    </a>
                </div>
                @else
                <div class="m-10 shrink-0 flex items-center max-sm:m-5">
                    <a class="text-2xl font-bold" href="{{ route('admin') }}">
                        RR
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin.login') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                        ログイン
                    </a>
                    <a href="{{ route('admin.register') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                        管理者登録
                    </a>
                </div>
                @endauth
            @endif
        </footer>
    </body>
</html>
