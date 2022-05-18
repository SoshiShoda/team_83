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
        }else {
            $inventory_searches = Product::with(['purchases'=>function($q){
                                        $q->where('purchased_status','active')
                                        ->orderBy('created_at','desc');
                                    }])
                                    ->where('product_status','active')
                                    ->orderBy('id','asc')
                                    ->get();
        }
        return view('admin/inventory_management',[
        'inventory_searches'=>$inventory_searches,
        'inventory_indexes'=>$inventory_indexes,
        'inventory_search_text'=>$inventory_search_text,
    ]);
    }

    /**
     * 商品詳細ページ表示
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $product = Product::find($request->id);
        return view('user.productDetail', [
            'product' => $product,
        ]);

    }

    /**
     * 商品登録
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'product_name' => 'required|max:50',
            'product_size' => 'required|max:50',
            'product_barcode' => 'required|max:13',
            'product_number' => 'required|max:10',
            'product_price' => 'required',
            'product_price_with_tax' => 'required',
            'product_tax_rate' => 'required',
            'product_category' => 'required|max:50',
            'product_detail' => 'required|max:191',
            'stock_quantity' => 'required',
            'ordering_point' => 'required',
            'product_image1' => 'required',
        ]);

        Product::create([
            'product_name' => $request->product_name,
            'product_size' => $request->product_size,
            'product_barcode' => $request->product_barcode,
            'product_number' => $request->product_number,
            'product_price' => $request->product_price,
            'product_price_with_tax' => $request->product_price_with_tax,
            'product_tax_rate' => $request->product_tax_rate,
            'product_category' => $request->product_category,
            'product_detail' => $request->product_detail,
            'stock_quantity' => $request->stock_quantity,
            'ordering_point' => $request->ordering_point,
            'product_image1' => $request->product_image1,
            'product_image2' => $request->product_image2,
            'product_image3' => $request->product_image3,
            'product_image4' => $request->product_image4,
            'product_image5' => $request->product_image5,
            'product_image6' => $request->product_image6,
        ]);

        // リダイレクト先=商品一覧ページ。須永さん作成後にリダイレクト先を更新します。
        return redirect('');
    }

    /**
     * 商品更新
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        // バリデート
        $this->validate($request, [
            'product_name' => 'required|max:50',
            'product_size' => 'required|max:50',
            'product_barcode' => 'required|max:13',
            'product_number' => 'required|max:10',
            'product_price' => 'required',
            'product_price_with_tax' => 'required',
            'product_tax_rate' => 'required',
            'product_category' => 'required|max:50',
            'product_detail' => 'required|max:191',
            'stock_quantity' => 'required',
            'ordering_point' => 'required',
            'product_image1' => 'required',
        ]);

        $product = Product::find($request->id);
        $product->product_name = $request->product_name;
        $product->product_size = $request->product_size;
        $product->product_barcode = $request->product_barcode;
        $product->product_number = $request->product_number;
        $product->product_price = $request->product_price;
        $product->product_price_with_tax = $request->product_price_with_tax;
        $product->product_tax_rate = $request->product_tax_rate;
        $product->product_category = $request->product_category;
        $product->product_detail = $request->product_detail;
        $product->stock_quantity = $request->stock_quantity;
        $product->ordering_point = $request->ordering_point;
        $product->product_image1 = $request->product_image1;
        $product->product_image2 = $request->product_image2;
        $product->product_image3 = $request->product_image3;
        $product->product_image4 = $request->product_image4;
        $product->product_image5 = $request->product_image5;
        $product->product_image6 = $request->product_image6;
        $product->save();

        // リダイレクト先=商品一覧ページ。須永さん作成後にリダイレクト先を更新します。
        return redirect('');
    }


}