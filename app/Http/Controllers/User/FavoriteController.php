<?php

namespace App\Http\Controllers\User;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $favorites = Favorite::where('user_id', $user)->get();
        return view('user.favorite.index', compact('favorites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $favorite=Favorite::create([
            'user_id'=>auth()->user()->id,
            'product_id'=>$request->product_id
        ]);

        $request->session()->flash('message','お気に入り登録しました');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $product->favorites()->delete();
        $request->session()->flash('message','お気に入り登録を解除しました');
        return redirect()->route('user.product.show',$product);
    }
}
