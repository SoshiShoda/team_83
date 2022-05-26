<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>purchase_register</title>
</head>
<body>
    <header id="header" class="wrapper">
            @include('common.header')
    </header>
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')
    <!-- <h2>仕入登録ページ</h2> -->
    <!-- <table class="purchase-items">
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
    <button type="submit">登録する</button> -->

    <div class="container">
        <h2>仕入登録ページ</h2>
        <form action="{{ route('purchase_register') }}" method="post">
            {{ csrf_field() }}
            <div id="purchase-id-box" class="input-group mb-3">
                <span id="purchase-id-span" class="input-group-text">仕入ID</span>
                <input type="number" disabled id="purchase-id-input" name="id" class="form-control">
            </div>
            <div id="product-id-box" class="input-group mb-3">
                <span id="product-id-span" class="input-group-text">商品ID</span>
                <input type="number" id="product-id-input" name="product_id" class="form-control">
            </div>
            <div id="purchased-price-box" class="input-group mb-3">
                <span id="purchased-price-span" class="input-group-text">仕入価格（税抜）</span>
                <input type="number" min="1" id="purchased-price-input" name="purchased_price" class="form-control">
                <span class="input-group-text" id="purchased-price-addon">円</span>
            </div>
            <div id="purchased-price-with-tax-box" class="input-group mb-3">
                <span id="purchased-price-with-tax-span" class="input-group-text">仕入価格（税込）</span>
                <input type="number" min="1" id="purchased-price-with-tax-input" name="purchased_price_with_tax" class="form-control">
                <span class="input-group-text" id="purchased-price-with-tax-addon">円</span>
            </div>
            <div id="purchased-tax-rate-box" class="input-group mb-3">
                <span id="purchased-tax-rate-span" class="input-group-text">消費税率</span>
                <input type="number" min="0" id="purchased-tax-rate-input" name="purchased_tax_rate" class="form-control">
                <span class="input-group-text" id="purchased-tax-rate-addon">%</span>
            </div>
            <div id="purchased-quantity-box" class="input-group mb-3">
                <span id="purchased-quantity-span" class="input-group-text">仕入数量</span>
                <input type="number" min="0" id="purchased-quantity-input" name="purchased_quantity" class="form-control">
            </div>
            <div id="purchased-date-box" class="input-group mb-3">
                <span id="purchased-date-span" class="input-group-text">発注日</span>
                <input type="date" id="purchased-date-input" name="purchased_date" class="form-control">
            </div>
            <div id="arrival-date-box" class="input-group mb-3">
                <span id="arrival-date-span" class="input-group-text">入荷日</span>
                <input type="date" id="arrival-date-input" name="arrival_date" class="form-control">
            </div>
            <div id="due-date-box" class="input-group mb-3">
                <span id="due-date-span" class="input-group-text">支払期限</span>
                <input type="date" id="due-date-input" name="due_date" class="form-control">
            </div>
            <div id="payment-date-box" class="input-group mb-3">
                <span id="payment-date-span" class="input-group-text">支払日</span>
                <input type="date" id="payment-date-input" name="payment_date" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">登録する</button>
            </div>
        </form>
    </div>

    <!-- スタイル -->
    <style>
        .input-group {
            max-width: 400px;
        }
    </style>
<script src="{{ asset('/js/header.js') }}"></script>
</body>
</html>