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
    <div class="search-parameter">
        <h3>検索条件</h3>
        <div>
            <label for="product-id">商品番号
                <input type="text" id="product-id">
            </label>
        </div>
        <div>
                <label for="product-name">商品名
                    <input type="text" id="product-name">
                </label>
        </div>
        <div>
            <label for="section-name">部門
                <input type="text" id="section-name">
            </label>
        </div>
        <div class="serach-buttons">
            <button>実行</button>
            <button>解除</button>
            <button>条件クリア</button>
        </div>
    </div>
    <div class="sales-table">
        <table>
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
    <div class="total-amounts">
        <div class="total-bought-price-without-tax">
            <label>税抜合計
                <span>\xxxx</span>
            </label>
        </div>
        <div class="total-tax-amount">
            <label for="">消費税合計
                <span>\xxxx</span>
        </div>
        <div class="total-tax-amount">
            <label for="">税込合計
                <span>\xxxx</span>
        </div>
    </div>
</body>
</html>