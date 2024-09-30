<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotify;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        return view('user.order.create', compact('user'));
    }

    public function store(Request $request)
    {
        $cartProducts = [];
        $totalAmount = 0;
        try {
            // 無名関数内での変更を反映させたいので参照渡し
            DB::transaction(function () use ($request,&$cartProducts,&$totalAmount) {
                $user = auth()->user();
                $cart = $user->cart;
                $cartProducts = $cart->products;
                
                // 在庫を減少させる
                foreach ($cartProducts as $cartProduct) {
                    $cartProduct->stock -= $cartProduct->pivot->quantity;
                    $cartProduct->save();
                }
    
                // 合計金額
                foreach($cartProducts as $cartProduct){
                    $totalAmount += $cartProduct->pivot->amount;
                }
        
                // カートの商品を削除
                $cart->products()->detach();

                // 注文履歴作成
                $order = Order::create([
                    'user_id' => $user->id,
                    'total_amount' => $totalAmount,
                ]);

                foreach($cartProducts as $cartProduct){
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartProduct->id,
                        'quantity' => $cartProduct->pivot->quantity,
                        'price' => $cartProduct->price,
                        'product_total' => $cartProduct->pivot->quantity * $cartProduct->price,
                    ]);
                }
        
                // メールを送信
                Mail::to($request->email)->send(new OrderNotify($cartProducts, $totalAmount, $request->address, $request->name, $request->payment_method,$request->phone_number));
            });
    
            return redirect()->route('order.show')->with(['cartProducts' => $cartProducts, 'totalAmount' => $totalAmount, 'message' => 'ご注文いただきありがとうございました']);
            
        } catch (\Exception $e) {
            // エラーハンドリング
            return redirect()->back()->with('error', '注文処理中にエラーが発生しました。');
        }
    }

    public function show(){
        return view('user.order.show');
    }
    
    public function index(){
        $user = auth()->user();
        // eager
        $orders = $user->orders()->with('orderItems.product')->get();
        return view('user.order.index', compact('orders'));
    }
}
