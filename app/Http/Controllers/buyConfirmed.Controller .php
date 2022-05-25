<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;

class buyConfirmedController extends Controller
{
    /**
     * 購入確定ページ 
     *
     * @param request $request
     * @return response
     *
     */
    public function index(Request $request)
    {
        $product_name = $request -> input('product_name');
        $product_size = $request -> input('product_size');
        return view('user.buy', [
            'product_naem' => $product_name,
            'product_size' => $product_size,
        ]);
    }
}
