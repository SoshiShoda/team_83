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

    protected $table = 'purchases';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'product_id',
        'purchased_price',
        'purchased_price_with_tax',
        'purchased_tax_rate',
        'purchased_quantity',
        'purchased_date',
        'arrival_date',
        'due_date',
        'payment_date'
    ];
}
