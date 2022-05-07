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

    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'product_status',
        'product_name',
        'product_size',
        'product_barcode',
        'product_number',
        'product_price',
        'product_price_with_tax',
        'product_tax_rate',
        'product_category',
        'product_detail',
        'stock_quantity',
        'ordering_point',
        'product_image1',
        'product_image2',
        'product_image3',
        'product_image4',
        'product_image5',
        'product_image6',
    ];

}
