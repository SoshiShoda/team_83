<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>purchaseList</title>
</head>
<body>
    <h2>仕入一覧ページ</h2>
    <div class="container search-parameter">
        <h3>検索条件</h3>
        <form action="" >
            <div id="purchase-id-search-box" class="input-group mb-3">
                <span id="purchase-id-search-span" class="input-group-text">仕入ID</span>
                <input type="text" id="purchase-id-search-input" name="purchase_keyword" class="form-control">
            </div>
            <div id="product-id-search-box" class="input-group mb-3">
                <span id="product-id-search-span" class="input-group-text">商品ID</span>
                <input type="text" id="product-id-search-input" name="product_keyword" class="form-control">
            </div>
            <div id="search-buttons-box" class="row row-cols-6 mb-3">
                <div class="col">
                    <button type="submit" class="form-control btn btn-primary" >実行</button>
                </div>
                <div class="col">
                    <button type="delete" class="form-control btn btn-outline-primary">解除</button>
                </div>
                <div class="col">
                    <button type="reset" class="form-control btn btn-outline-primary">条件クリア</button>
                </div>
            </div>
        </form>
<!--    <div>
            <label for="product-id">仕入ID
                <input type="text" id="product-id">
            </label>
        </div>
        <div>
                <label for="product-name">商品ID
                    <input type="text" id="product-name">
                </label>
        </div>
        <div class="search-buttons">
            <button>実行</button>
            <button>解除</button>
            <button>条件クリア</button>
        </div>
    </div> -->
    <table>
        <tr>
            <th>仕入ID</th>
            <th>商品ID</th>
            <th>仕入価格（税込）</th>
            <th>仕入価格（税抜）</th>
            <th>税率</th>
            <th>仕入数量</th>
            <th>発注日</th>
            <th>入荷日</th>
            <th>支払期限</th>
            <th>支払日</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @forelse ($purchases as $purchase)
        <tr>
            <td><div>{{ $purchase->id }}</div></td>
            <td><div>{{ $purchase->product_id }}</div></td>
            <td><div>{{ $purchase->purchased_price }}</div></td>
            <td><div>{{ $purchase->purchased_price_with_tax }}</div></td>
            <td><div>{{ $purchase->purchased_tax_rate }}</div></td>
            <td><div>{{ $purchase->purchased_quantity }}</div></td>
            <td><div>{{ $purchase->purchased_date }}</div></td>
            <td><div>{{ $purchase->arrival_date }}</div></td>
            <td><div>{{ $purchase->due_date }}</div></td>
            <td><div>{{ $purchase->payment_date }}</div></td>
            <td><div></div></td>
            <td>
                <form action="{{ url('purchase/'.$purchase->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" id="delete-purchase-{{ $purchase->id }}" class="btn btn-danger">
                        <span class="fa fa-btn fa-trash">削除</span>
                    </button>
                </form>
            </td>
        </tr>
        @empty
            <p>該当案件が見つかりませんでした</p>
        @endforelse
    </table>

</body>
</html>