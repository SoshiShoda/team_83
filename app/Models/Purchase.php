<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // product（商品）と連結
    public function product()
    {
    return $this->belongsTo(Product::class);
    }
}
