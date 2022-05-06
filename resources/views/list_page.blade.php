<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
</head>
<body>

<h3>作成ページ一覧（このページは後日削除します。）</h3>
<div>
    <h3>正田さん</h3>
    <ul>
        <li><a href="{{ url('/purchaseList') }}">仕入一覧</a></li>
        <li><a href="{{ url('/registerNewPurchase') }}">仕入登録</a></li>
        <li><a href="{{ url('/salesManagement') }}">販売管理</a></li>
        <li><a href="{{ url('/productEdit') }}">商品編集</a></li>
        <li><a href="{{ url('/productRegister') }}">商品登録</a></li>
    </ul>
</div>

<div>
    <h3>太田</h3>
    <ul>
        <li><a href="{{ url('/inventory_management') }}">在庫管理</a></li>
        <li><a href="{{ url('/review_edit') }}">レビュー編集</a></li>
        <li><a href="{{ url('/review_register') }}">レビュー登録</a></li>
</div>
    </html>