<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductCategory;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Cart;
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'info',
        'price',
        'stock',
        'category',
        'brand_id',
        'image',
    ];

    protected $casts = [
        // categoryカラムがEnumにキャストされる
        'category' => ProductCategory::class,
    ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function Favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function carts() {
        return $this->belongsToMany(Cart::class,'cart_product')->withPivot('quantity', 'amount')->withTimestamps();
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
