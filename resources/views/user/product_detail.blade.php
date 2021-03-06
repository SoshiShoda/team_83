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
    <style>
        body > div.container > div > div.for-buy {
            width: 30%;
            min-width: 192px;
        }

        body > div.container > div > div.main {
            width: 70%;
        }

        #slider-for-box {
            position: relative;
            width: 100%;
        }

        #slider-for-box:before {
            content: '';
            display: block;
            padding-top: 75%;
        }

        #slider-for-box > ul {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        #slider-for-box > ul > div > div > li.slick-slide.slick-current.slick-active {
            width: 100%;
        }

        #slider-for-box {
            width: 100%;
        }

        #slider-for-box > ul > div > div > li > img {
            width: 100%;
            height: auto;
        }

        body > div.container > div > div.main > div.slider-nav-box > ul > div > div > li > img {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <header id="header" class="wrapper">
            @include('common.header')
        </header>
        <div class="row">
            <!-- ?????????????????? -->
            <div class="main">
                <h3>????????????{{ $product->product_name }}</h3>
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

            <!-- ???????????????????????? -->
            <div class="for-buy">
                <h3>????????????</h3>
                <!-- ??????????????????????????????????????? -->
                @include('common.errors')
                <form action="{{ url('/product_detail/cart') }}" method="post">
                {{ csrf_field() }}
                    <input type="text" class="bg-light text-center form-control" hidden id="product_id" name="product_id" value="{{ $product->id }}">
                    <p>????????????{{ $product->product_name }}</p>
                    <input type="text" class="bg-light text-center form-control" hidden id="product_name" name="product_name" value="{{ $product->product_name }}" placeholder="{{ $product->product_name }}">
                    <p>???????????????{{ $product->product_price }}???</p>
                    <input type="number" class="bg-light text-center form-control" hidden id="bought_price" name="bought_price" value="{{ $product->product_price }}" placeholder="{{ $product->product_price }}">
                    <p>???????????????{{ $product->product_price_with_tax }}???</p>
                    <input type="number" class="bg-light form-control" hidden id="bought_price_with_tax" name="bought_price_with_tax" value="{{ $product->product_price_with_tax }}" placeholder="{{ $product->product_price_with_tax}}">
                    <input type="number" class="bg-light form-control" hidden id="bought_tax_rate" name="bought_tax_rate" value="{{ $product->product_tax_rate }}" placeholder="{{ $product->product_tax_rate }}">
                    <input type="hidden" name="product_number" value="{{ $product->product_number }}">
                    <div id="buying-box" class="mb-3">
                        <div class="product-size-box mb-3">
                            <label id="product-size-label" class="input-group-text">?????????</label>
                            <select name="product_size" id="product-size-datalist" list="product-size-datalist" class="form-control">
                                <option value="S" selected="selected">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                            </select>
                        </div>
                        <div class="bought-quantity-box mt-3">
                            <label id="bought-quantity-label" class="input-group-text" for="bought_quantity">?????????</label>
                            <input type="number" min="1" name="bought_quantity" class="form-control" max="10" value="1">
                        </div>
                        <p class="mt-3">???????????????</p>
                        <p>{{ $inventory_check_result }}</p>
                        <p id="buying-button">
                            <button type="submit" class="btn btn-primary btn-sm form-control">??????????????????</button>
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
    <script src="{{ asset('/js/header.js') }}"></script>
</body>
</html>