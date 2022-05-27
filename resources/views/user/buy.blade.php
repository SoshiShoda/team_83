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
        <form action="{{ route('buy_fix', ['user_id'=>$user_id]) }}" method="POST">
            {{ csrf_field() }}
            <div id="main">
                <div id="main-header row">
                    <p>注文内容の確認</p>
                    @foreach ($sum_product_quantities as $sum_product_quantity)
                    <p>カートに入っている商品：計{{ $sum_product_quantity->count_id }}点</p>
                    @endforeach
                </div>
                @foreach ($cart_products as $cart_product)
                <li>
                    <div class="product-in-cart bg-light mb-3">
                        <input type="text" name="user_id" hidden value="{{ $cart_product->user_id }}">
                        <p>商品名：XXXX</p>
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
                            <p>数量：<input type="number" name="bought_quantity" value="{{ $cart_product->bought_quantity }}"></input></p>

                        </div>
                    </div>
                </li>
                @endforeach
                <div id="total-price">
                    @foreach ($sum_product_amounts as $sum_product_amount )
                    <p>税抜金額合計：{{ $sum_product_amount->bought_price }}円</p>
                    @endforeach
                </div>
            </div>
            <div id="user-info" class="">
                <p id="user-address">お届け先：</p>
                <p>お名前：{{ $user_address->user_name }}</p>
                <p>〒{{ $user_address->post_code }}</p>
                <p>ご住所：{{ $user_address->prefecture }}{{ $user_address->municipality }}{{ $user_address->apartment }}</p>

                <p id="pay-method">お支払方法：</p>
                <input type="text" name="payment_method" list="payment-method-list" class="form-control">
                <datalist id="payment-method-list">
                    <option value="クレジットカード"></option>
                    <option value="銀行振込"></option>
                    <option value="コンビニ/郵便局での現金"></option>
                </datalist>
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