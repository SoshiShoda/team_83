<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;

class ProductListController extends Controller
{
    /**
     * 商品一覧ページ 初期表示
     *
     * @param request $request
     * @return response
     *
     */
    public function index(Request $request)
    {
        $product = Product::find($request->id);
        return view('user.productList', [
            'product' => $product,
        ]);
    }

    /**
     * 商品一覧ページ検索
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        //検索キーワード取得
        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];

            $inventory_searches = Product::with(['purchases'=>function($q){
                $q->where('','')
                ->orderBy('','');
            }])
            
        }
        
    }
}