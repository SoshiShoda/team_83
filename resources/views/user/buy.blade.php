<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>購入</title>
    <style>
        li {
            list-style: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- ヘッダー -->
        <header id="header" class="header">
            @include('common.header')
        </header>
        <h3>購入画面</h3>
        <!-- メイン -->
        <form action="{{ route('buy_fix') }}" method="POST">
            {{ csrf_field() }}
            <div id="main">
                <div id="main-header row">
                    <p>注文内容の確認</p>
                    
                    <p>カートに入っている商品：計{{ $sum_product_quantities->count_id }}点</p>
                    
                </div>
                @foreach ($cart_products as $cart_product)
                <li>
                    <div class="product-in-cart bg-light mb-3">
                        <input type="text" name="user_id" hidden value="{{ $cart_product->user_id }}">
                        <p>{{ $cart_product->product_name }}</p>
                        <input type="text" name="product_id" hidden value="{{ $cart_product->product_id }}" >
                        <div>
                            <p>税抜価格：{{ $cart_product->bought_price }}円</p>
                            <input type="text" name="bought_price" hidden value="{{ $cart_product->bought_price }}">
                        </div>
                        <div>
                            <p>税込価格：{{ $cart_product->bought_price_with_tax }}円</p>
                            <input type="text" name="bought_price_with_tax" hidden value="{{ $cart_product->bought_price_with_tax }}">
                        </div>
                        <input type="text" name="bought_tax_rate" hidden value="{{ $cart_product->bought_tax_rate }}"></input>
                        <div>
                            <p>数量：<input type="text" name="bought_quantity" value="{{ $cart_product->bought_quantity }}" disabled></input></p>

                        </div>
                    </div>
                </li>
                @endforeach
                <div id="total-price">
                    <p>金額合計：{{ $sum_product_amounts->bought_price }}円</p>
                </div>
            </div>
            <div id="user-info" class="">
                <p id="user-address">お届け先：</p>
                <p>お名前：{{ $user->user_name }}</p>
                <p>〒{{ $user->post_code }}</p>
                <p>ご住所：{{ $user->prefecture }}{{ $user->municipality }}{{ $user->apartment }}</p>

                <p id="pay-method">お支払方法：</p>
                <select name="payment_method" class="form-control">
                    <option value="クレジットカード" selected="selected">クレジットカード</option>
                    <option value="銀行振込">銀行振込</option>
                    <option value="コンビニ/郵便局での現金">コンビニ/郵便局での現金</option>
                </select>
            </div>
            <div>
                <button type="submit" class="form-control btn btn-primary">注文を確定する</button>
            </div>
        </form>
    </div>
    <script>
        const ham = document.querySelector('#js-hamburger');
        const nav = document.querySelector('#js-nav');
        ham.addEventListener('click', function () {
            ham.classList.toggle('active');
            nav.classList.toggle('active');
        });
    </script>
</body>
</html>
