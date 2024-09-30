<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Comment extends Model
{
    use HasFactory;
    // 個別に保存するならfillable無しでも保存可能（連想配列で保存する場合は必要）
    protected $fillable = [
        'body',
        'product_id',
        'user_id',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
