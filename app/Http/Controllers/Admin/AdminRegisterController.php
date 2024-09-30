<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AdminRegisterController extends Controller
{
    // 登録画面呼び出し
    public function create(): View
    {
        return view('admin.auth.register');
    }

    // 登録実行
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'avatar' => ['image','max:1024'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if(request('avatar')){
            $name = request()->file('avatar')->getClientOriginalName();        // 元のファイル名を取得
            request()->file('avatar')->move('storage/images/avatar',$name);    // $nameという名前でファイルを保存
            $validated['avatar'] = $name;                                          // $nameという名前でDBに保存
        }

        $admin = Admin::create($validated);

        event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return redirect(route('admin.brand.mybrand', absolute: false))->with([
            'register_msg' => 'ご登録いただきありがとうございます',
        ]);
    }
}
