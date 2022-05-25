<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;

class memberRegistrationCompController extends Controller
{
    /**
     * 購入ページ 
     *
     * @param request $request
     * @return response
     *
     */
    public function index(Request $request)
    {
        $product_name = $request -> input('product_name');
        $product_size = $request -> input('product_size');
        $product_price_with_tax = $request -> input('product_price_with_tax');
        return view('user.memberRegistrationComp', [
            'product_naem' => $product_name,
            'product_size' => $product_size,
            'rpoduct_price_with_tax' => $product_price_with_tax,
        ]);
    }
}
