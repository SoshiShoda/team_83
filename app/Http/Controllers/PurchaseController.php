<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    /**
     * 仕入一覧表示
     *
     * @param Request $request
     * @return response
     */
    public function index(Request $request)
    {
        $purchaseKeyword = $request->input('purchase_keyword');
        $productKeyword = $request->input('product_keyword');
        $query = Purchase::query();
        if(!empty($purchaseKeyword)) {
            $query->where('id', 'like', '%' . $purchaseKeyword . '%');
            $purchases = $query->orderBy('created_at', 'desc')->get();
        }

        if(!empty($productKeyword)) {
            $query->where('product_id', 'like', '%' . $productKeyword . '%');
            $purchases = $query->orderBy('created_at', 'desc')->get();
        }

        $purchases = $query->orderBy('created_at', 'desc')->get();
        return view('admin.purchaseList', [
            'purchases' => $purchases,
        ]);

    }

    /**
     * 仕入新規登録
     *
     * @param Request $request
     * @return response
     */
    public function store(Request $request)
    {
        // バリデート
        $this->validate($request, [
            'product_id' => 'required',
            'purchased_price' => 'required|max:10',
            'purchased_price_with_tax' => 'required|max:10',
            'purchased_tax_rate' => 'required|max:3',
            'purchased_quantity' => 'required|max:10',
            'purchased_date' => 'required',
            'arrival_date' => 'required',
            'due_date' => 'required',
        ]);

        Purchase::create([
            'product_id' => $request->product_id,
            'purchased_price' => $request->purchased_price,
            'purchased_price_with_tax' => $request->purchased_price_with_tax,
            'purchased_tax_rate' => $request->purchased_tax_rate,
            'purchased_quantity' => $request->purchased_quantity,
            'purchased_date' => $request->purchased_date,
            'arrival_date' => $request->arrival_date,
            'due_date' => $request->due_date,
            'payment_date' => $request->payment_date,
        ]);

        return redirect('/purchaseList');

    }

    /**
     * 仕入削除
     *
     * @param Request $request
     * @param Purchase $purchase
     * @return Response
     */
    public function destroy(Request $request, Purchase $purchase)
    {
        $purchase->delete();
        return redirect('/purchaseList');
    }
}
