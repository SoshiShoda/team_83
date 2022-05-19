<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buy;

class BuyController extends Controller
{
    /**
     * 売上情報一覧
     *
     * @param Request $request
     * @return Response
     */
    public function buyIndex(Request $request)
    {
        $product_number_search = $request->input('product_number_search');
        $product_name_search = $request->input('product_name_search');
        $query = Buy::query();
        if(!empty($product_number_search)) {
            $query->where('product_number', 'like', '%' . $product_number_search . '%');
            $buy_searches = $query->orderBy('created_at', 'desc')->get();
        }

        if(!empty($product_name_search)) {
            $query->where('product_name', 'like', '%' . $product_name_search . '%');
            $buy_searches = $query->orderBy('created_at', 'desc')->get();
        }

        $buy_searches = $query->orderBy('created_at', 'desc')->get();

        // 税抜価格合計算出
        $sum_bought_prices = Buy::selectRaw('SUM(bought_price) as bought_price')->get();

        // 税込合計算出
        $sum_bought_price_with_taxes = Buy::selectRaw('SUM(bought_price_with_tax) as bought_price_with_taxes')->get();

            return view('admin/sales_management', [
                'buy_searches' => $buy_searches,
                'sum_bought_prices' => $sum_bought_prices,
                'sum_bought_price_with_taxes' => $sum_bought_price_with_taxes,
            ]);
    }
}


