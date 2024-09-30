<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <!-- ガードで一般と管理者分ける -->
                @if(Auth::guard('web')->check())
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-logo/>
                        </a>
                    </div>
                @endif
                @if(Auth::guard('admin')->check())
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('admin.brand.mybrand') }}">
                            <x-logo/>
                        </a>
                    </div>
                @endif
                @if (Auth::guest())
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('free.main') }}">
                            <x-logo/>
                        </a>
                    </div>
                @endif

                <!-- User Navigation Links -->
                @if(Auth::guard('web')->check())
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('favorite.index')" :active="request()->routeIs('favorite.index')">
                            お気に入り一覧
                        </x-nav-link>
                    </div>
                
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                            カート
                        </x-nav-link>
                    </div>
                
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                            注文履歴
                        </x-nav-link>
                    </div>
                @endif

                <!-- Admin Navigation Links -->
                @if(Auth::guard('admin')->check())
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('admin.brand.mybrand')" :active="request()->routeIs('admin.brand.mybrand')">
                            MYブランド一覧
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('admin.brand.index')" :active="request()->routeIs('admin.brand.index')">
                            ブランド一覧
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('admin.brand.create')" :active="request()->routeIs('admin.brand.create')">
                            ブランド登録
                        </x-nav-link>
                    </div>
                @endif

                <!-- Free Navigation Links -->
                @if (Auth::guest())
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            会員登録
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('register')">
                            ログイン
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.create')">
                            お問い合わせ
                        </x-nav-link>
                    </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Auth::guest())
                            <div>ゲストさん</div>
                        @else
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <img src="/storage/images/avatar/{{ Auth::user()->avatar}}" class="rounded-full w-8 h-8 object-cover ml-1">

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- ガードで一般と管理者分ける -->
                        @if(Auth::guard('web')->check())
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        @endif
                        
                        @if(Auth::guard('admin')->check())
                        <x-dropdown-link :href="route('admin.profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <!-- ガードで一般と管理者分ける -->
                        @if(Auth::guard('web')->check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        @endif

                        @if(Auth::guard('admin')->check())
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::guard('web')->check())
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                トップページへ
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('favorite.index')" :active="request()->routeIs('favorite.index')">
                お気に入り一覧
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                カート
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('order.index')" :active="request()->routeIs('order.index')">
                注文履歴
            </x-responsive-nav-link>
            @endif

            @if(Auth::guard('admin')->check())
            <x-responsive-nav-link :href="route('admin.brand.mybrand')" :active="request()->routeIs('admin.brand.mybrand')">
                MYブランド一覧
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.brand.index')" :active="request()->routeIs('admin.brand.index')">
                ブランド一覧
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.brand.create')" :active="request()->routeIs('admin.brand.create')">
                ブランド登録
            </x-responsive-nav-link>
            @endif

            @if (Auth::guest())
            <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                会員登録
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                ログイン
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.create')">
                お問い合わせ
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @if (Auth::guest())
                <div>ゲストさん</div>
            @else
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            @endif

            <div class="mt-3 space-y-1">

                @if(Auth::guard('web')->check())
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @endif
                
                @if(Auth::guard('admin')->check())
                <x-responsive-nav-link :href="route('admin.profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                @if(Auth::guard('web')->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                @endif

                @if(Auth::guard('admin')->check())
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('admin.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
                @endif
            </div>
        </div>
    </div>
</nav>
