<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\ProductCategory; // enumを使用
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    // ブランド毎に一覧表示
    public function index(Brand $brand){
        $products = $brand->products()->paginate(5);
        return view('admin.product.index', compact('brand', 'products'));
    }

    // 商品登録画面表示
    public function create(Brand $brand){
        Gate::authorize('admin',$brand);
        $categories = ProductCategory::cases();
        return view('admin.product.create', compact('brand','categories'));
    }

    // ブランド毎に商品登録
    public function store(Request $request,Brand $brand){
        Gate::authorize('admin',$brand);
        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'info' => 'required|string|max:200',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category' => ['required', 'string', Rule::in(array_column(ProductCategory::cases(), 'value'))],
            'image' => 'image|max:1024',
        ]);

        $validated['brand_id'] = $brand->id;

        if(request('image')){
            $original = request()->file('image')->getClientOriginalName();    // 元のファイル名を取得
            $name = date('Ymd_His').'_'.$original;                            // 日付を結合
            request()->file('image')->move('storage/images/products',$name);  // $nameという名前でファイルを保存
            $validated['image'] = $name;                                      // $nameという名前でDBに保存
        }

        $product=Product::create($validated);

        $request->session()->flash('message','登録しました');
        return redirect()->route('admin.product.index',$brand);
    }

    // 商品詳細表示
    public function show(Product $product){
        Gate::authorize('admin',$product->brand);
        return view('admin.product.show',compact('product'));
    }

    // 商品編集画面表示
    public function edit(Product $product){
        Gate::authorize('admin',$product->brand);
        $categories = ProductCategory::cases();
        return view('admin.product.edit',compact('product','categories'));
    }

    // 商品更新処理
    public function update(Request $request,Product $product){
        Gate::authorize('admin',$product->brand);
        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'info' => 'required|string|max:200',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category' => ['required', 'string', Rule::in(array_column(ProductCategory::cases(), 'value'))],
            'image' => 'image|max:1024',
        ]);

        $validated['brand_id'] = $product->brand->id;

        if(request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images/products',$name);
            $validated['image'] = $name;
        }

        $product->update($validated);

        $request->session()->flash('message','更新しました');
        return redirect()->route('admin.product.show',$product);
    }

    // 商品削除
    public function destroy(Request $request,Product $product){
        Gate::authorize('admin',$product->brand);
        $product->comments()->delete();
        $product->delete();
        $request->session()->flash('message','削除しました');
        return redirect()->route('admin.product.index',$product->brand);
    }
}
