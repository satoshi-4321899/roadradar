<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', $user)->first();
        $cartProducts = $cart->products()->withPivot('quantity', 'amount')->get();

        // 商品合計金額
        $totalAmount = 0;
        foreach($cartProducts as $cartProduct){
            $totalAmount += $cartProduct->pivot->amount;
        }
        return view('user.cart.index', compact('cartProducts','totalAmount'));
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
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $user = auth()->id();

        $cart = Cart::where('user_id',$user)->first();
        $productPrice = Product::find($productId)->price;

        $cart->products()->attach($productId, [
            'quantity' => $quantity,
            'amount' => $quantity * $productPrice // 商品の価格と数量から合計額を計算
        ]);

        return redirect()->back()->with('message', '商品がカートに追加されました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($productId)
    {
        $user = auth()->user();
        $cart = $user->cart;

        // 商品をカートから削除
        $cart->products()->detach($productId);

        return redirect()->back()->with('message', '商品がカートから削除されました');
    }
}
