<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>商品一覧</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .product-list-image {
        width: 100%;
    }
    </style>
</head>
<body>
    <!-- ヘッダー部分 -->
    <header id="header" class="wrapper">
        @include('common.header')
    </header>
    <!-- 検索 -->
    <div class="text-center">
        <form action="">
                    <div class="input-group">
                        <input type="text" placeholder="商品を探す" name="product_list_search" class="form-control">
                        <button type="submit" class="form-control btn btn-primary">検索</button>
                    </div>
        </form>
    </div>

    <!-- 商品一覧 -->
    <div>
        <ul class="product-list">
            @foreach ($product_list_results as $product_list_result)
            <li>
                <a href="{{ Route('product_detail' ,$product_list_result->id) }}">
                    <div class="row">
                        <div class="">
                            <img src="{{ $product_list_result->product_image1 }}" class="product-list-image rounded">
                        </div>
                        <div>
                            <p>{{ $product_list_result->product_name }}</p>
                            <p>{{ $product_list_result->product_price }}円（税抜）</p>
                            <p>商品番号：{{ $product_list_result->product_number }}</p>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <script src="{{ asset('/js/header.js') }}"></script>
</body>
</html>