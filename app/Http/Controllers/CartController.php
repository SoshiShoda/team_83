<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * 商品をカートに追加
     *
     * @param Request $request
     * @return Response
     */
    public function addCart(Request $request)
    {
        Cart::create([
            // 'user_id' => $request->user_id, //ユーザーセッション完成出来次第コメントアウト解除する。
            'user_id' => '1',//ユーザーセッション完成出来次第コメントアウトする。
            'product_id' => $request->product_id,
            'bought_price' => $request->bought_price,
            'bought_price_with_tax' => $request->bought_price_with_tax,
            'bought_tax_rate' => $request->bought_tax_rate,
            'bought_quantity' => $request->bought_quantity,
        ]);

        return redirect('/purchase');
    }


}
