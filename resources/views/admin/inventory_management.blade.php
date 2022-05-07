<!DOCTYPE html>
<html lang=" str_replace('_', '-', app()->getLocale()) ">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>在庫管理ページ</title>
</head>
<body>
    <h2>在庫管理ページ</h2>
            <div>
                <h3>検索条件</h3>

                <form>
                    <label class="form-label">商品名</label>
                    <input type="search" name="inventory_search_text" value="{{ $inventory_search_text }}" list="inventory-search-list">
                    <datalist id="inventory-search-list">
                        @foreach ($inventory_indexes as $inventory_index)
                        <option value="{{ $inventory_index->product_name }}">{{ $inventory_index->product_name }}</option>
                        @endforeach
                    </datalist>
                    <button type="submit">検索</button>
                </form>
            </div>

    <div>
        <a href="{{ url('/productRegister') }}"><button>商品新規登録</button></a>
        <button>商品一覧</button>
    </div>
    <div>
        <table class="table table-striped">
        <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>商品サイズ</th>
            <th>直近仕入価格<br>(税込)</th>
            <th>販売価格<br>(税込)</th>
            <th>最終仕入日</th>
            <th>発注点</th>
            <th>在庫数</th>
            <th>メッセージ</th>
            <th>発注</th>
            <th>商品情報編集</th>
        </tr>
        @foreach ($inventory_searches as $inventory_search)
        <tr>
            <td>{{ $inventory_search->id }}</td>
            <td>{{ $inventory_search->product_name }}</td>
            <td>{{ $inventory_search->product_size }}</td>
            <td>{{ $inventory_search->purchases->first()->purchased_price_with_tax }}</td>
            <td>{{ $inventory_search->product_price_with_tax }}</td>
            <td>{{ $inventory_search->purchases->first()->purchased_date }}</td>
            <td>{{ $inventory_search->ordering_point }}</td>
            <td>{{ $inventory_search->stock_quantity }}</td>
            <td>@if($inventory_search->stock_quantity < $inventory_search->ordering_point){{'発注点を下回りました。'}}@endif</td>
            <td><button submit="">発注</button></td>
            <td><button>編集</button></td>
            </tr
            >@endforeach

        </table>
    </div>


</body>
</html>