<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>salesManagement</title>
    <style>
        /* 全体 */

        .container {
            min-width: 800px;
        }

        table {
            margin: auto;
        }

        table,tr,th,td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,td {
            padding: 7px;
        }

        .form-box {
            text-align: center;
        }

        /* 条件検索エリア */
        #search-buttons-box {
            margin-top: 15px;
            display: flex;
            justify-content: center;
        }

        /* 検索結果一覧エリア */
        .salesManagement-block {
            text-align: center;
        }

        /* 合計値エリア */
        #total-amounts-area {
            display: flex;
            justify-content: center;
        }

        .total-amount {
            display: flex;
            justify-content: center;
            /* border: 1px solid black; */
            margin-right: 30px;
            border-bottom: 1px solid black;
            font-weight: bold;
            font-size: large;
        }


        #product-number-search-box,
        #product-name-search-box {
            width: 50%;
            text-align: center;
        }

    </style>
</head>
<body>
    <!-- ヘッダー部分 -->
    <header id="header" class="wrapper">
        @include('common.header')
    </header>
    <div class="container text-center">
        <h2>販売管理ページ</h2>
        <h3>条件検索</h3>
        <div class="salesManagement-block" id="search-parameter">
            <form action="" >
                <div class="form-boc">
                    <div id="product-number-search-box" class="input-group mb-3">
                        <span id="product-number-search-span" class="input-group-text">商品番号</span>
                        <input type="text" id="product-number-search-input" name="product_number_search" class="form-control">
                    </div>
                    <div id="product-name-search-box" class="input-group mb-3">
                        <span id="product-name-search-span" class="input-group-text">商品名</span>
                        <input type="text" id="product-name-search-input" name="product_name_search" class="form-control">
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
                </div>
            </form>
        </div>

        <h3>検索結果一覧</h3>

        <div class="salesManagement-block" id="sales-table-area">
            <table id="sales-table-area-table">
                <tr>
                    <th>売上日時</th>
                    <th>商品番号</th>
                    <th>商品名</th>
                    <th>数量</th>
                    <th>税抜価格</th>
                    <th>税込価格</th>
                    <!-- <th>商品詳細</th> -->
                    <!-- <th>顧客番号</th> -->
                    <!-- <th>顧客名</th> -->
                </tr>
                @forelse ($buy_searches as $buy_search)
                <tr>
                        <td>{{ $buy_search->created_at }}</td>
                        <td>{{ $buy_search->product_id }}</td>
                        <td>{{ $buy_search->product_name }}</td>
                        <td>{{ $buy_search->bought_quantity }}</td>
                        <td>{{ $buy_search->bought_price }}</td>
                        <td>{{ $buy_search->bought_price_with_tax }}</td>
                        <!-- <td>{{ $buy_search->product_detail }}</td> -->
                        <!-- <td>{{ $buy_search->user_id }}</td> -->
                </tr>
                @empty
                    <p>該当案件が見つかりませんでした</p>
                @endforelse
            </table>
        </div>

        <h3>合計値</h3>

        <div class="salesManagement-block" id="total-amounts-area">
            <div class="total-amount">
                <label>税抜合計：</label>
                <div>
                    @foreach ($sum_bought_prices as $sum_bought_price)
                    <div>{{ $sum_bought_price->bought_price }}円</div>
                    @endforeach
                </div>
            </div>
            <div class="total-amount">
                <label for="">税込合計：</label>
                <div>
                    @foreach ($sum_bought_price_with_taxes as $sum_bought_price_with_tax)
                    <div>{{ $sum_bought_price_with_tax->bought_price_with_taxes }}円</div>
                    @endforeach
                </div>
            </div>
            <!-- <div class="total-amount">
                <label for="">税込合計</label>
                <span>要解決ポイント</span> -->
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/header.js') }}"></script>
</body>
</html>