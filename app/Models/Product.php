<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // purchase(仕入)と連結
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

     // Buy(売上)と連結
    public function buys()
    {
        return $this->hasMany(Buy::class);
    }

     // cart(カート)と連結
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

     // review(レビュー)と連結
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
