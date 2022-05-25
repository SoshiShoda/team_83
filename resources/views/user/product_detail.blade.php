<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>product_detail</title>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
            <!-- 写真ボックス -->
            <div class="main">
                <h3>商品名：{{ $product->product_name }}</h3>
                <!-- <div class="main-picture-box text-center">
                    <img class="w-100" src="https://picsum.photos/1000/1000" alt="mainPicture">
                </div> -->
                <div id="slider-for-box" class="">
                    <ul class="slider-for">
                        <li><img class="slider-for-picture" src="{{ $path1 }}" alt=""></li>
                        <li><img class="slider-for-picture" src="{{ $path2 }}" alt=""></li>
                        <li><img class="slider-for-picture" src="{{ $path3 }}" alt=""></li>
                        <li><img class="slider-for-picture" src="{{ $path4 }}" alt=""></li>
                        <li><img class="slider-for-picture" src="{{ $path5 }}" alt=""></li>
                        <li><img class="slider-for-picture" src="{{ $path6 }}" alt=""></li>
                    </ul>
                </div>
                <div class="slider-nav-box">
                    <ul class="slider-nav">
                        <li><img class="slider-nav-picture" src="{{ $path1 }}" alt=""></li>
                        <li><img class="slider-nav-picture" src="{{ $path2 }}" alt=""></li>
                        <li><img class="slider-nav-picture" src="{{ $path3 }}" alt=""></li>
                        <li><img class="slider-nav-picture" src="{{ $path4 }}" alt=""></li>
                        <li><img class="slider-nav-picture" src="{{ $path5 }}" alt=""></li>
                        <li><img class="slider-nav-picture" src="{{ $path6 }}" alt=""></li>
                    </ul>
                </div>
            </div>

            <!-- 商品情報ボックス -->
            <div class="for-buy">
                <h3>商品情報</h3>
                <form action="{{ '/product_detail/{id}/post' }}" method="post">
                {{ csrf_field() }}
                    <input type="text" class="bg-light form-control" hidden id="product_id" name="user_id" value="{{ $product->user_id }}">
                    <input type="text" class="bg-light text-center form-control" hidden id="product_id" name="product_id" value="{{ $product->id }}">
                    <p>商品名：{{ $product->product_name }}</p>
                    <input type="text" class="bg-light text-center form-control" hidden id="product_name" name="product_name" value="{{ $product->product_name }}" placeholder="{{ $product->product_name }}">
                    <p>税抜価格：{{ $product->product_price }}円</p>
                    <input type="number" class="bg-light text-center form-control" hidden id="bought_price" name="bought_price" value="{{ $product->product_price }}" placeholder="{{ $product->product_price }}">
                    <p>税込価格：{{ $product->product_price_with_tax }}円</p>
                    <input type="number" class="bg-light form-control" hidden id="bought_price_with_tax" name="bought_price_with_tax" value="{{ $product->product_price_with_tax }}" placeholder="{{ $product->product_price_with_tax}}">
                    <input type="number" class="bg-light form-control" hidden id="bought_tax_rate" name="bought_tax_rate" value="{{ $product->product_tax_rate }}" placeholder="{{ $product->product_tax_rate }}">
                    <div id="buying-box" class="mb-3">
                        <div class="product-size-box mb-3">
                            <label id="product-size-label" class="input-group-text">サイズ</label>
                            <input type="text" name="product_size" list="product-size-datalist" class="form-control">
                                <datalist id="product-size-datalist">
                                    <option value="S"></option>
                                    <option value="M"></option>
                                    <option value="L"></option>
                                </datalist>
                        </div>
                        <div class="bought-quantity-box mt-3">
                            <label id="bought-quantity-label" class="input-group-text" for="bought_quantity">注文数</label>
                            <input type="number" min="1" name="bought_quantity" class="form-control">
                        </div>
                        <p class="mt-3">在庫有無：</p>
                        <p>{{ $inventory_check_result }}</p>
                        <p id="buying-button">
                            <button type="submit" class="btn btn-primary btn-sm form-control">カートに追加</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>