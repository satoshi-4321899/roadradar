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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="flex justify-between">
            <div class="m-10 shrink-0 flex items-center max-sm:m-5">
                <a class="text-2xl font-bold max-sm:text-xl" href="{{ route('dashboard') }}">
                    RR
                </a>
            </div>
            <div class="flex items-center">
                <a href="{{ route('favorite.index') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                    お気に入り一覧
                </a>
                <a href="{{ route('cart.index') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                    カート
                </a>
                <a href="{{ route('order.index') }}" class="mr-10 max-sm:mr-5 max-sm:text-xs">
                    注文履歴
                </a>
            </div>
        </footer>
    </body>
</html>
