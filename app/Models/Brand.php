<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'info',
        'admin_id',
        'image',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    
    public function products(){
        return $this->HasMany(Product::class);
    }

}
