<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purchase;

class PurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 商品１
        Purchase::create([
            'id'                          => '1',
            'purchased_status'            => 'active',
            'product_id'                  => '1',
            'purchased_price'             => '1000',
            'purchased_price_with_tax'    => '1100',
            'purchased_tax_rate'          => '10',
            'purchased_quantity'          => '50',
            'purchased_date'              => '2022-05-18',
            'arrival_date'                => '2022-05-19',
            'due_date'                    => '2022-05-20',
            'payment_date'                => '2022-05-21',
        ]);

        // 商品２
        Purchase::create([
            'id'                          => '2',
            'purchased_status'            => 'active',
            'product_id'                  => '2',
            'purchased_price'             => '2000',
            'purchased_price_with_tax'    => '2200',
            'purchased_tax_rate'          => '10',
            'purchased_quantity'          => '100',
            'purchased_date'              => '2021-04-18',
            'arrival_date'                => '2021-04-19',
            'due_date'                    => '2021-04-20',
            'payment_date'                => '2021-04-21',
        ]);

        // 商品３
        Purchase::create([
            'id'                          => '3',
            'purchased_status'            => 'active',
            'product_id'                  => '3',
            'purchased_price'             => '3000',
            'purchased_price_with_tax'    => '3300',
            'purchased_tax_rate'          => '10',
            'purchased_quantity'          => '150',
            'purchased_date'              => '2022-03-18',
            'arrival_date'                => '2022-03-19',
            'due_date'                    => '2022-03-20',
            'payment_date'                => '2022-03-21',
        ]);
    }
}
