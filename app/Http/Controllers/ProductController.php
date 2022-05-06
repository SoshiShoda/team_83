<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;

class ProductController extends Controller
{
    /**
     * 在庫管理ページ
     * 商品名検索
     * 
     * @param request $request
     * @return response
     * 
     */
    public function inventory_search(Request $request)
    {
        // プルダウン表示用一覧
        $inventory_indexes = Product::where('product_status','active')->orderBy('product_name','desc')->get();

        // 商品名検索
        $inventory_searches = null;
        $inventory_search_text = $request->input('inventory_search_text');
        if($inventory_search_text !=null){
            $inventory_searches = Product::with(['purchases'=>function($q){
                                        $q->where('purchased_status','active')
                                        ->orderBy('created_at','desc');
                                    }])
                                    ->where('product_name','like','%'.$inventory_search_text.'%')
                                    ->where('product_status','active')
                                    ->orderBy('id','asc')
                                    ->get();
            return view('admin/inventory_management',[
                'inventory_searches'=>$inventory_searches,
                'inventory_indexes'=>$inventory_indexes,
                'inventory_search_text'=>$inventory_search_text,
            ]);
        }else {
            $inventory_searches = Product::with(['purchases'=>function($q){
                                        $q->where('purchased_status','active')
                                        ->orderBy('created_at','desc');
                                    }])
                                    ->where('product_status','active')
                                    ->orderBy('id','asc')
                                    ->get();
            return view('admin/inventory_management',[
                'inventory_searches'=>$inventory_searches,
                'inventory_indexes'=>$inventory_indexes,
                'inventory_search_text'=>$inventory_search_text,
            ]);
        }
    }

}