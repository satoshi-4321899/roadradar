<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // コントローラーなどで実際に使用する際に引数の数に注意
        // Gate::defineメソッドで定義されたゲートのコールバック関数には、最初の引数として現在ログインしているユーザーの情報が渡される
        Gate::define('admin', function ($user,Brand $brand) {
            return $user->id === $brand->admin_id;
        });

    }
}
