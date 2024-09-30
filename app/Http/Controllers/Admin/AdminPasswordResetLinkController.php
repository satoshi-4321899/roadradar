<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AdminPasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('admin.auth.forgot-password'); // Admin用のパスワードリセットリクエストページ
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // broker()でadminテーブルを指定
        $status = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
