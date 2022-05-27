<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
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
    protected $fillable = [
        'id',
        'bought_status',
        'user_id',
        'product_name',
        'product_number',
        'invoice_id',
        'product_id',
        'bought_price',
        'bought_price_with_tax',
        'bought_tax_rate',
        'bought_quantity',
        'payment_method',
        'created_at',
        'updated_at',
    ];

}
