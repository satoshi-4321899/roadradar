<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class ContactController extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(Request $request){
        $validated=request()->validate([
            'title'=>'required|max:255',
            'email'=>'required|email|max:255',
            'body'=>'required|max:1000',
        ]);
        Contact::create($validated);

        // Mail::to(config('mail.admin'))->send(new ContactForm($validated));
        // bccで管理者にも情報共有（フォーム投稿者のメールには表示されない）
        Mail::to($validated['email'])->bcc(config('mail.admin'))->send(new ContactForm($validated));

        return back()->with('message', '確認メールを送信しましたのでご確認ください');
    }
}
