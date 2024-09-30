<?php

use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminPasswordController;
use App\Http\Controllers\Admin\AdminNewPasswordController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminPasswordResetLinkController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Free\FreeMainController;
use Illuminate\Support\Facades\Route;


// User&Free WelcomePage
Route::get('/', [FreeMainController::class, 'welcome'])->name('user.free');

// Admin WelcomePage
Route::get('/admin', function () {
    return view('admin.welcome');
})->name('admin');



// ゲストユーザー用ルーティング
Route::middleware(['guest'])->group(function () {
    // トップページ
    Route::get('/free/main', [FreeMainController::class, 'index'])->name('free.main');

    // カテゴリーごとに商品を表示
    Route::get('/free/category/{category}', [FreeMainController::class, 'showCategory'])->name('free.category.show');

    // ブランドごとに表示
    Route::get('/free/brand/{brand}', [FreeMainController::class, 'showBrand'])->name('free.brands.show');

    // カテゴリーごとに価格検索
    Route::get('/free/product/search', [FreeMainController::class, 'searchProduct'])->name('free.product.search');

    // 商品詳細
    Route::get('/free/product/{product}', [FreeMainController::class, 'show'])->name('free.product.show');
});



// 一般ユーザー用ルーティング
Route::middleware(['verified'])->group(function(){
    // トップページ
    Route::get('/dashboard', [UserProductController::class, 'index'])->name('dashboard');

    // アカウント編集
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // カテゴリーごとに商品を表示
    Route::get('/products/category/{category}', [UserProductController::class, 'showCategory'])->name('products.category.show');

    // ブランドごとに表示
    Route::get('/user/brand/{brand}', [UserProductController::class, 'showBrand'])->name('user.brands.show');

    // カテゴリーごとに価格検索
    Route::get('/user/product/search', [UserProductController::class, 'searchProduct'])->name('user.product.search');
    
    // 商品詳細
    Route::get('/user/product/{product}', [UserProductController::class, 'show'])->name('user.product.show');

    // コメント追加
    Route::post('product/comment/store', [CommentController::class, 'store'])->name('comment.store');

    // お気に入り登録
    Route::post('post/favorite/store', [FavoriteController::class, 'store'])->name('favorite.store');

    // お気に入り解除
    Route::delete('favorite/{product}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');

    // お気に入り商品一覧
    Route::get('user/favorite', [FavoriteController::class, 'index'])->name('favorite.index');

    // カートへ商品追加
    Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
    
    // カート商品一覧
    Route::get('cart/index', [CartController::class, 'index'])->name('cart.index');
    
    // カート商品削除
    Route::delete('cart/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');
    
    // 注文手続きフォーム
    Route::get('order/form', [OrderController::class, 'create'])->name('order.form');

    // 注文確定処理
    Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
    
    // 注文確定後
    Route::get('order/show', [OrderController::class, 'show'])->name('order.show');
    
    // 注文履歴閲覧
    Route::get('order/index', [OrderController::class, 'index'])->name('order.index');
});



// お問い合わせ機能
Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');



// 管理者用ルーティング
// 登録
Route::get('admin/register', [AdminRegisterController::class, 'create'])->name('admin.register');
Route::post('admin/register', [AdminRegisterController::class, 'store']);

// ログイン・ログアウト
Route::get('admin/login', [AdminLoginController::class, 'showLoginPage'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');

// パスワードリセット
Route::get('admin/forgot-password', [AdminPasswordResetLinkController::class, 'create'])->name('admin.password.request');
Route::post('admin/forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('admin.password.email');
Route::get('admin/reset-password/{token}', [AdminNewPasswordController::class, 'create'])->name('admin.password.reset');
Route::post('admin/reset-password', [AdminNewPasswordController::class, 'store'])->name('admin.password.store');

// 以下の中は認証必須のエンドポイントとなる
Route::middleware(['auth:admin'])->group(function () {

    // ブランド登録
    Route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('admin/brand/post', [BrandController::class, 'store'])->name('admin.brand.post');
    
    // ブランド編集
    Route::get('admin/brand/{brand}/edit', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::patch('admin/brand/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
    
    // ブランド削除
    Route::delete('admin/brand/{brand}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
    
    // ブランド一覧表示
    Route::get('admin/brand', [BrandController::class, 'index'])->name('admin.brand.index');
    
    // 自己作成のブランドのみ表示
    Route::get('admin/brand/mybrand', [BrandController::class, 'mybrand'])->name('admin.brand.mybrand');
    
    // 商品登録
    Route::get('admin/product/{brand}/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('admin/product/{brand}/post', [ProductController::class, 'store'])->name('admin.product.post'); 
    
    // 商品編集
    Route::get('admin/product/{product}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::patch('admin/product/{product}', [ProductController::class, 'update'])->name('admin.product.update'); 
    
    // 商品削除
    Route::delete('admin/product/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    // 商品一覧表示
    Route::get('admin/{brand}/product', [ProductController::class, 'index'])->name('admin.product.index');
    
    // 商品詳細表示
    Route::get('admin/product/{product}', [ProductController::class, 'show'])->name('admin.product.show');

    
    // 管理者情報編集
    // 名前・アドレス編集
    Route::get('admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('admin/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');

    // パスワード編集
    Route::put('admin/password', [AdminPasswordController::class, 'update'])->name('admin.password.update');
});


require __DIR__.'/auth.php';
