<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{
    // ブランド一覧表示
    public function index(){
        $brands = Brand::paginate(5); // ページネーション
        return view('admin.brand.index',compact('brands'));
    }

    // ブランド登録フォーム表示
    public function create(){
        return view('admin.brand.create');
    }

    // ブランド登録処理
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:brands|max:30', // ブランド名はユニークとする
            'info' => 'required|max:400',
            'image' => 'image|max:1024',
        ]);

        $validated['admin_id'] = auth()->id();

        if(request('image')){
            $name = request()->file('image')->getClientOriginalName();        // 元のファイル名を取得
            request()->file('image')->move('storage/images/brands',$name);    // $nameという名前でファイルを保存
            $validated['image'] = $name;                                      // $nameという名前でDBに保存
        }

        $brand = Brand::create($validated);
        $request->session()->flash('message','登録しました');
        return redirect()->route('admin.brand.mybrand');
    }

    // ブランド編集画面
    public function edit(Brand $brand){
        Gate::authorize('admin',$brand); // ブランド作成者以外は編集不可
        return view('admin.brand.edit',compact('brand'));
    }

    // ブランド更新処理
    public function update(Request $request,Brand $brand){
        Gate::authorize('admin',$brand);
        $validated = $request->validate([
            'name' => 'required|max:20',
            'info' => 'required|max:400',
            'image' => 'image|max:1024',
        ]);

        $validated['admin_id'] = auth()->id();

        if(request('image')){
            $name = request()->file('image')->getClientOriginalName(); 
            request()->file('image')->move('storage/images/brands',$name);    
            $validated['image'] = $name;                              
        }

        $brand->update($validated);
        $request->session()->flash('message','更新しました');
        return redirect()->route('admin.brand.mybrand');
    }

    // ブランド削除処理
    public function destroy(Request $request,Brand $brand){
        Gate::authorize('admin',$brand); // ブランド作成者以外は削除不可
        $brand->products()->delete();    // 商品も同時に削除
        $brand->delete();                // ブランドを削除
        $request->session()->flash('message','削除しました');
        return redirect()->route('admin.brand.mybrand');
    }

    public function mybrand(){
        $admin = auth()->user()->id;
        $brands = Brand::where('admin_id',$admin)->paginate(5);
        return view('admin.brand.mybrand',compact('brands'));
    }
}
