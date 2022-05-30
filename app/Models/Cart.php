<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
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

    protected $table = 'carts';
    protected $fillable = [
        'id',
        'cart_status',
        'user_id',
        'product_id',
        'product_name',
        'product_number',
        'bought_price',
        'bought_price_with_tax',
        'bought_tax_rate',
        'bought_quantity',
        'created_at',
        'updated_at',
    ];
}
