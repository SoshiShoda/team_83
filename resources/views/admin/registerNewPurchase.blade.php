<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registerNewPurchase</title>
</head>
<body>
    <h2>仕入登録ページ</h2>
    <table class="purchase-items">
        <tr>
            <td>仕入ID</td>
            <td></td>
        </tr>
        <tr>
            <td>商品ID</td>
            <td><input type="text"></td>
        </tr>
        <tr>
            <td>仕入価格（税込）</td>
            <td><input type="number">円</td>
        </tr>
        <tr>
            <td>仕入価格（税抜）</td>
            <td><input type="number">円</td>
        </tr>
        <tr>
            <td>消費税率</td>
            <td><input type="number" max="100" min="0">%</td>
        </tr>
        <tr>
            <td>仕入数量</td>
            <td><input type="number" min="0"></td>
        </tr>
        <tr>
            <td>発注日</td>
            <td><input type="date"></td>
        </tr>
        <tr>
            <td>入荷日</td>
            <td><input type="date"></td>
        </tr>
        <tr>
            <td>支払期限</td>
            <td><input type="date"></td>
        </tr>
        <tr>
            <td>支払日</td>
            <td><input type="date"></td>
        </tr>
    </table>
    <button type="submit">登録する</button>

</body>
</html>