<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;



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
