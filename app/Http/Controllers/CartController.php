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



    /* *************************************
    ここから下は正田が途中までPGを進めた購入画面周辺です。
    先生よろしくお願いいたします。
    ************************************** */
    /**
     * 商品をカートに追加
     *
     * @param Request $request
     * @return Response
     */
    public function addCart(Request $request, User $user_id, Product $product_id)
    {
        $this->validate($request, [
            'bought_quantity' => 'required|max:10|',
        ]);


        Cart::create([
            'user_id' => $user_id->id,
            'product_id' => $product_id->id,
            'bought_price' => $request->bought_price,
            'bought_price_with_tax' => $request->bought_price_with_tax,
            'bought_tax_rate' => $request->bought_tax_rate,
            'bought_quantity' => $request->bought_quantity,
        ]);
        return redirect('/buy/' . $user_id->id);
    }


    /**
     * 購入画面表示（Cartsテーブル情報表示）
     *
     * @param Request $request
     * @return void
     */
    public function buyPageIndex(User $user_id)
    {
        // カートに入っている商品情報を取得

        $query = Cart::where('id', $user_id->id);
        $cart_products = $query->orderBy('created_at', 'desc')->get();

        // 合計点数の表示
        $sum_product_quantities = Cart::selectRaw('COUNT(id) as count_id')->get();

        // 合計金額表示
        $sum_product_amounts = Cart::selectRaw('SUM(bought_price) as bought_price')->get();

        // お届け先情報を取得
        $query_address = User::query($user_id->id);
        $user_address = $query_address->first();

        return view('user/buy', [
            'cart_products' => $cart_products,
            'sum_product_quantities' => $sum_product_quantities,
            'sum_product_amounts' => $sum_product_amounts,
            'user_address' => $user_address,
        ]);
    }


    /**
     * 購入確定ボタン押下時
     *
     * @param Request $request
     * @return void
     */
    public function buyFix(Request $request, User $user_id, Product $product_id)
    {

        // Buyテーブルに追加
        foreach ($request as $new_buy){
            Buy::create([
                'user_id' => Auth::id(),
                'invoice_id' => 1111,
                'product_id' => $request->input('product_id'),
                'product_name' => 'a',
                'product_number' => 1111,
                'bought_price' => $request->input('bought_price'),
                'bought_price_with_tax' => $request->input('bought_price_with_tax'),
                'bought_tax_rate' => $request->input('bouguht_tax_rate'),
                'bought_quantity' => $request->input('bought_quantity'),
                'payment_method' => $request->input('payment_method'),
            ]);
        };


        return redirect('user/buyConfirmed');
    }

}
