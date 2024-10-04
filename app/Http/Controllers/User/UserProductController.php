<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Enums\ProductCategory;

class UserProductController extends Controller
{
    // トップページ
    public function index(){
        $products = Product::where('category','bikes')->orderBy('created_at', 'desc')->take(8)->get();
        $apparels = Product::where('category','apparels')->orderBy('created_at', 'desc')->take(3)->get();
        $categories = ProductCategory::cases();
        $brands = Brand::all();
        return view('user.dashboard', compact('products','apparels','categories','brands'));
    }

    // カテゴリー別一覧表示
    public function showCategory($category)
    {
        $products = Product::where('category', $category)->paginate(12);
        return view('user.category.index', compact('products', 'category'));
    }

    // ブランド別一覧表示
    public function showBrand($brand)
    {
        $showBrands = Product::where('brand_id', $brand)->paginate(12);
        $brandName = Brand::where('id',$brand)->pluck('name')->first(); // get()だとエラーになる、単一の値を取得したい場合はfirst()使う
        return view('user.brand.index', compact('showBrands', 'brand','brandName'));
    }

    // カテゴリー別の価格検索
    public function searchProduct(Request $request){
        $category = $request->input('category');
        $minPrice = $request->input('price-1');
        $maxPrice = $request->input('price-2');
        $searchProducts = Product::where('category',$category)
                            ->whereBetween('price',[$minPrice,$maxPrice])
                            ->paginate(12)
                            ->appends([
                                'category' => $category,
                                'price-1' => $minPrice,
                                'price-2' => $maxPrice
                            ]);;
        return view('user.search.index', compact('searchProducts','category','minPrice','maxPrice'));
    }

    // 商品詳細表示
    public function show(Product $product){
        // ddd($product);
        $user = auth()->user();
        $isFavorited = $user->favorites()->where('product_id', $product->id)->exists(); // trueかfalseを返す
        $relations = Product::where('category',$product->category)->inRandomOrder()->take(3)->get();
        return view('user.product.show',compact('product','relations','isFavorited'));
    }
}
