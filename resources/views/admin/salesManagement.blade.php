<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salesManagement</title>
    </head>
<body>
    <h2>販売管理ページ</h2>
    <h3>条件検索</h3>
    <div style="background-color: aqua; " class="salesManagement-block" id="search-parameter">
        <div class="search-input-area">
            <table>
                <tr>
                    <td><label for="product-id">商品番号</label></td>
                    <td><input type="text" id="product-id"></td>
                </tr>
                <tr>
                    <td><label for="product-name">商品名</label></td>
                    <td><input type="text" id="product-name"></td>
                </tr>
                <tr>
                    <td><label for="section-name">部門</label></td>
                    <td><input type="text" id="section-name"></td>
                </tr>
            </table>
        </div>

        <div class="search-buttons">
            <button>実行</button>
            <button>解除</button>
            <button>条件クリア</button>
        </div>
    </div>

    <h3>検索結果一覧</h3>

    <div style="background-color: violet;" class="salesManagement-block" id="sales-table-area">
        <table id="sales-table-area-table">
            <tr>
                <th>売上日時</th>
                <th>商品番号</th>
                <th>商品名</th>
                <th>部門</th>
                <th>数量</th>
                <th>税抜価格</th>
                <th>税込価格</th>
                <th>商品詳細</th>
                <th>顧客番号</th>
                <th>顧客名</th>
            </tr>
            <tr>
                <td>x月x日</td>
                <td>111</td>
                <td>aaaa</td>
                <td>07</td>
                <td>2</td>
                <td>\1,000</td>
                <td>\1,100</td>
                <td>商品詳細ページへ</td>
                <td>111</td>
                <td>aaaaaa</td>
            </tr>
            <tr>
                <td>x月x日</td>
                <td>111</td>
                <td>aaaa</td>
                <td>07</td>
                <td>2</td>
                <td>\1,000</td>
                <td>\1,100</td>
                <td>商品詳細ページへ</td>
                <td>111</td>
                <td>aaaaaa</td>
            </tr>
            <tr>
                <td>x月x日</td>
                <td>111</td>
                <td>aaaa</td>
                <td>07</td>
                <td>2</td>
                <td>\1,000</td>
                <td>\1,100</td>
                <td>商品詳細ページへ</td>
                <td>111</td>
                <td>aaaaaa</td>
            </tr>
            <tr>
                <td>x月x日</td>
                <td>111</td>
                <td>aaaa</td>
                <td>07</td>
                <td>2</td>
                <td>\1,000</td>
                <td>\1,100</td>
                <td>商品詳細ページへ</td>
                <td>111</td>
                <td>aaaaaa</td>
            </tr>
            <tr>
                <td>x月x日</td>
                <td>111</td>
                <td>aaaa</td>
                <td>07</td>
                <td>2</td>
                <td>\1,000</td>
                <td>\1,100</td>
                <td>商品詳細ページへ</td>
                <td>111</td>
                <td>aaaaaa</td>
            </tr>
        </table>
    </div>

    <h3>合計値</h3>

    <div style="background-color: greenyellow;" class="salesManagement-block" id="total-amounts-area">
        <div class="total-amount">
            <label>税抜合計</label>
            <span>\xxxx</span>
        </div>
        <div class="total-amount">
            <label for="">消費税合計</label>
            <span>\xxxx</span>
        </div>
        <div class="total-amount">
            <label for="">税込合計</label>
            <span>\xxxx</span>
        </div>
    </div>

    <style>
        /* 全体 */
        table {
            margin: auto;
        }

        table,th,td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,td {
            padding: 7px;
        }

        /* 条件検索エリア */
        .search-buttons {
            margin-top: 15px;
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

        .total-amount label {
            background-color: lightgrey;
        }

    </style>
</body>
</html>