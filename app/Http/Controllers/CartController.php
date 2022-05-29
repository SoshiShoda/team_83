<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\BUY;

class CartController extends Controller
{
    // /**
    //  * 商品をカートに追加
    //  *
    //  * @param Request $request
    //  * @return Response
    //  */
    // public function addCart(Request $request)
    // {
    //     Cart::create([
    //         // 'user_id' => $request->user_id, //ユーザーセッション完成出来次第コメントアウト解除する。
    //         'user_id' => '1',//ユーザーセッション完成出来次第コメントアウトする。
    //         'product_id' => $request->product_id,
    //         'bought_price' => $request->bought_price,
    //         'bought_price_with_tax' => $request->bought_price_with_tax,
    //         'bought_tax_rate' => $request->bought_tax_rate,
    //         'bought_quantity' => $request->bought_quantity,
    //     ]);

    //     return redirect('/purchase');
    // }

    /**
     * 商品をカートに追加
     *
     * @param Request $request
     * @return Response
     */
    public function addCart(Request $request)
    {
        //セッションからuser_idを取得
        $user_id = $request->session()->get('id');
        Cart::create([
            'user_id' => $user_id,
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'product_number' => $request->product_number,
            'bought_price' => $request->bought_price,
            'bought_price_with_tax' => $request->bought_price_with_tax,
            'bought_tax_rate' => $request->bought_tax_rate,
            'bought_quantity' => $request->bought_quantity,
        ]);
        return redirect('/buy');
    }


    /**
     * 購入画面表示（Cartsテーブル情報表示）
     *
     * @param Request $request
     * @return void
     */
    public function buyPageIndex(Request $request)
    {
        //セッションからuser_idを取得
        $user_id = $request->session()->get('id');

        // カートに入っている商品情報を取得
        $query = Cart::where('user_id', $user_id);
        $cart_products = $query->orderBy('created_at', 'desc')->get();

        // 合計点数の表示
        $sum_product_quantities = Cart::selectRaw('COUNT(id) as count_id')->first();

        // 合計金額表示
        $sum_product_amounts = Cart::selectRaw('SUM(bought_price_with_tax) as bought_price')->first();

        // お届け先情報を取得
        $user = User::where('id',$user_id)->first();

        return view('user/buy', [
            'cart_products' => $cart_products,
            'sum_product_quantities' => $sum_product_quantities,
            'sum_product_amounts' => $sum_product_amounts,
            'user' => $user,
        ]);
    }


    /**
     * 購入確定ボタン押下時
     *
     * @param Request $request
     * @return void
     */
    public function buyFix(Request $request)
    {
        $carts_data = Cart::where('user_id',$request->user_id)->get();
        $max_invoice_id = BUY::selectRaw('MAX(invoice_id) as max_invoice_id ')->pluck('max_invoice_id');
        //$max_invoice_id = BUY::MAX('invoice_id')->first();
        if( !isset($max_invoice_id) ){
            $max_invoice_id[0] = 202200000;
        }
        $new_invoice_id = $max_invoice_id[0] + 1;

        foreach ($carts_data as $cart_data){
            // Buyテーブルに追加
            Buy::create([
                'user_id' => $cart_data->user_id,
                'invoice_id' => $new_invoice_id,
                'product_id' => $cart_data->product_id,
                'product_name' => $cart_data->product_name,
                'product_number' => $cart_data->product_number,
                'bought_price' => $cart_data->bought_price,
                'bought_price_with_tax' => $cart_data->bought_price_with_tax,
                'bought_tax_rate' => $cart_data->bought_tax_rate,
                'bought_quantity' => $cart_data->bought_quantity,
                'payment_method' => $request->input('payment_method'),
            ]);

            //cartsの削除
            Cart::where('id',$cart_data->id)->delete();

        };


        return redirect('buyConfirmed');
    }

}
