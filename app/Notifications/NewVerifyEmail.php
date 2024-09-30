<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class NewVerifyEmail extends VerifyEmail
{
    // askdkcを入れている場合は下記の記述がないとオーバーライドできない
    public static $toMailCallback;

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('メールアドレスの確認')
            ->line('ご登録ありがとうございます。')
            ->line('新しいメンバーが増えて、とても嬉しいです。')
            ->action('このボタンをクリック', $url)
            ->line('上記ボタンをクリックすると、ご登録が完了します！');
    }
}
