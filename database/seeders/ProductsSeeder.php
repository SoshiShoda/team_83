<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 商品１
        Product::create([
            'id'                        => '1',
            'product_status'            => 'active',
            'product_name'              => 'てすと商品１',
            'product_size'              => 'M',
            'product_barcode'           => '10001',
            'product_number'            => '20001',
            'product_price'             => '1000',
            'product_price_with_tax'    => '1100',
            'product_tax_rate'          => '10',
            'product_category'          => 'アウター',
            'product_detail'            => 'てすと商品だよ',
            'ordering_point'            => '100',
        ]);

        // 商品２
        Product::create([
            'id'                        => '2',
            'product_status'            => 'active',
            'product_name'              => 'てすと商品２',
            'product_size'              => 'L',
            'product_barcode'           => '10002',
            'product_number'            => '20002',
            'product_price'             => '2000',
            'product_price_with_tax'    => '2200',
            'product_tax_rate'          => '10',
            'product_category'          => 'アウター',
            'product_detail'            => 'てすと商品だよ～ん',
            'ordering_point'            => '200',
        ]);

        // 商品３
        Product::create([
            'id'                        => '3',
            'product_status'            => 'active',
            'product_name'              => 'てすと商品３',
            'product_size'              => 'S',
            'product_barcode'           => '10003',
            'product_number'            => '20003',
            'product_price'             => '3000',
            'product_price_with_tax'    => '3300',
            'product_tax_rate'          => '10',
            'product_category'          => 'セーター',
            'product_detail'            => 'てすと商品だよ～～ん',
            'ordering_point'            => '300',
        ]);
    }
}
