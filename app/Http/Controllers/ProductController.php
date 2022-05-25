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
        $inventory_indexes = Product::where('product_status', 'active')->orderBy('product_name', 'desc')->get();

        // 商品名検索
        $inventory_searches = null;
        $inventory_search_text = $request->input('inventory_search_text');
        if ($inventory_search_text !=null) {
            $inventory_searches = Product::with(['purchases'=>function ($q) {
                $q->where('purchased_status', 'active')
                                        ->orderBy('created_at', 'desc');
            }])
                                    ->where('product_name', 'like', '%'.$inventory_search_text.'%')
                                    ->where('product_status', 'active')
                                    ->orderBy('id', 'asc')
                                    ->get();
        } else {
            $inventory_searches = Product::with(['purchases'=>function ($q) {
                $q->where('purchased_status', 'active')
                                        ->orderBy('created_at', 'desc');
            }])
                                    ->where('product_status', 'active')
                                    ->orderBy('id', 'asc')
                                    ->get();
        }
        return view('admin/inventory_management', [
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
    public function productDetailIndex(Request $request)
    {
        $product = Product::find($request->id);

        // 商品画像1～6(product_image1～6)取得変数
        $path1 = $product->product_image1;
        $path2 = $product->product_image2;
        $path3 = $product->product_image3;
        $path4 = $product->product_image4;
        $path5 = $product->product_image5;
        $path6 = $product->product_image6;

        // 在庫有無チェック
        if ($product->stock_quantity > 0) {
            $inventory_check_result = "在庫あり";
        } else {
            $inventory_check_result = "在庫なし";
        }

        return view('user.product_detail', [
            'product' => $product,
            'inventory_check_result' => $inventory_check_result,
            'path1' => $path1,
            'path2' => $path2,
            'path3' => $path3,
            'path4' => $path4,
            'path5' => $path5,
            'path6' => $path6,
        ]);

    }

    /**
     * 商品登録
     *
     * @param Request $request
     * @return Response
     */
    public function productStore(Request $request)
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
            'product_image1' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image2' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image3' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image4' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image5' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image6' => ['file', 'mimes:jpeg,jpg,png'],
        ]);

        // 商品画像(product_image1～6)アップロード
        $filename1 = $request->product_image1->getClientOriginalName();
        $img1 = $request->file('product_image1')->storeAs('', $filename1, 'public');
        $path1 = "/storage/" . $img1;

        $filename2 = $request->product_image2->getClientOriginalName();
        $img2 = $request->file('product_image2')->storeAs('', $filename2, 'public');
        $path2 = "/storage/" . $img2;

        $filename3 = $request->product_image3->getClientOriginalName();
        $img3 = $request->file('product_image3')->storeAs('', $filename3, 'public');
        $path3 = "/storage/" . $img3;

        $filename4 = $request->product_image4->getClientOriginalName();
        $img4 = $request->file('product_image4')->storeAs('', $filename4, 'public');
        $path4 = "/storage/" . $img4;

        $filename5 = $request->product_image5->getClientOriginalName();
        $img5 = $request->file('product_image5')->storeAs('', $filename5, 'public');
        $path5 = "/storage/" . $img5;

        $filename6 = $request->product_image6->getClientOriginalName();
        $img6 = $request->file('product_image6')->storeAs('', $filename6, 'public');
        $path6 = "/storage/" . $img6;

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
            'product_image1' => $path1,
            'product_image2' => $path2,
            'product_image3' => $path3,
            'product_image4' => $path4,
            'product_image5' => $path5,
            'product_image6' => $path6,
        ]);

        return redirect('/sales_management');
    }



    /**
     * 商品編集ページ表示
     *
     * @param int $id
     * @return Response
     */
    public function productEditIndex($id)
    {
        $product_to_be_edited = Product::find($id);

        return view('admin.product_edit', [
            'product_to_be_edited'=>$product_to_be_edited,
        ]);
    }

    /**
     * 商品情報更新
     *
     * @param Response $response
     * @param int $id
     * @return Response
     */
    public function productUpdate(Request $request, $id)
    {
        // バリデート
        $this->validate($request, [
            'id' => 'required',
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
            'product_image1' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image2' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image3' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image4' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image5' => ['file', 'mimes:jpeg,jpg,png'],
            'product_image6' => ['file', 'mimes:jpeg,jpg,png'],
        ]);

        $filename1 = $request->product_image1->getClientOriginalName();
        $img1 = $request->file('product_image1')->storeAs('', $filename1, 'public');
        $path1 = "/storage/" . $img1;

        $filename2 = $request->product_image2->getClientOriginalName();
        $img2 = $request->file('product_image2')->storeAs('', $filename2, 'public');
        $path2 = "/storage/" . $img2;

        $filename3 = $request->product_image3->getClientOriginalName();
        $img3 = $request->file('product_image3')->storeAs('', $filename3, 'public');
        $path3 = "/storage/" . $img3;

        $filename4 = $request->product_image4->getClientOriginalName();
        $img4 = $request->file('product_image4')->storeAs('', $filename4, 'public');
        $path4 = "/storage/" . $img4;

        $filename5 = $request->product_image5->getClientOriginalName();
        $img5 = $request->file('product_image5')->storeAs('', $filename5, 'public');
        $path5 = "/storage/" . $img5;

        $filename6 = $request->product_image6->getClientOriginalName();
        $img6 = $request->file('product_image6')->storeAs('', $filename6, 'public');
        $path6 = "/storage/" . $img6;

        $update = [
            'id' => $request->id,
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
            'product_image1' => $path1,
            'product_image2' => $path2,
            'product_image3' => $path3,
            'product_image4' => $path4,
            'product_image5' => $path5,
            'product_image6' => $path6,
        ];

        Product::where('id', $id)->update($update);
        return back()->with('success', '更新しました');
    }
}