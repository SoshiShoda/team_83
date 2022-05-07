<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // user（ユーザー）と連結
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    // product（商品）と連結
    public function product()
    {
    return $this->belongsTo(Product::class);
    }
}
