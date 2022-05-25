<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>product_register</title>
</head>
<body>
    <div class="container">
        <h2>商品登録ページ</h2>
        <form action="{{ route('product_register') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div id="product-id-box" class="input-group mb-3">
                <span id="product-id-span" class="input-group-text">商品ID</span>
                <input type="text" disabled name="product_id" id="product-id-input" class="form-control">
            </div>
            <div id="product-name-box" class="input-group mb-3">
                <span id="product-name-span" class="input-group-text">商品名</span>
                <input type="text" name="product_name" id="product-name-input" class="form-control">
            </div>
            <div id="product-size-box" class="input-group mb-3">
                <label id="product-size-label" class="input-group-text">商品サイズ</label>
                <input type="text" name="product_size" list="product-size-datalist" class="form-control">
                <datalist id="product-size-datalist">
                    <option value="S"></option>
                    <option value="M"></option>
                    <option value="L"></option>
                </datalist>
            </div>
            <div id="product-barcode-box" class="input-group mb-3">
                <span id="product-barcode-span" class="input-group-text">JANコード</span>
                <input type="text" name="product_barcode" id="product-barcode-input" class="form-control">
            </div>
            <div id="product-number-box" class="input-group mb-3">
                <span id="product-number-span" class="input-group-text">商品番号</span>
                <input type="text" name="product_number" id="product-number-input" class="form-control">
            </div>
            <div id="product-price-box" class="input-group mb-3">
                <span id="product-price-span" class="input-group-text">商品販売価格（税抜）</span>
                <input type="number" min="1" name="product_price" id="product-price-input" class="form-control">
                <span class="input-group-text" id="product-price-addon">円</span>
            </div>
            <div id="product-price-with-tax-box" class="input-group mb-3">
                <span id="product-price-with-tax-span" class="input-group-text">商品販売価格（税込）</span>
                <input type="number" min="1" name="product_price_with_tax" id="product-price-with-tax-input" class="form-control">
                <span class="input-group-text" id="product-price-with-tax-addon">円</span>
            </div>
            <div id="product-tax-rate-box" class="input-group mb-3">
                <span id="product-tax-rate-span" class="input-group-text">消費税率</span>
                <input type="text" name="product_tax_rate" id="product-tax-rate-input" class="form-control">
                <span class="input-group-text" id="product-tax-rate-addon">%</span>
            </div>
            <div id="product-category-box" class="input-group mb-3">
                <label id="product-category-label" class="input-group-text">商品カテゴリー</label>
                <input type="text" name="product_category" list="product-category-datalist" class="form-control">
                <datalist id="product-category-datalist">
                    <option value="アウター"></option>
                    <option value="Tシャツ"></option>
                    <option value="セーター"></option>
                </datalist>
            </div>
            <div id="product-detail-box" class="input-group mb-3">
                <span id="product-detail-span" class="input-group-text">商品説明</span>
                <input type="text" name="product_detail" id="product-detail-input" class="form-control">
            </div>
            <div id="stock-quantity-box" class="input-group mb-3">
                <span id="stock-quantity-span" class="input-group-text">在庫数</span>
                <input type="number" min="0" name="stock_quantity" id="stock-quantity-input" class="form-control">
            </div>
            <div id="ordering-point-box" class="input-group mb-3">
                <span id="ordering-point-span" class="input-group-text">発注点</span>
                <input type="number" min="0" name="ordering_point" id="ordering-point-input" class="form-control">
            </div>
            <!-- 商品画像1 -->
            <div id="product-image1-box" class="input-group mb-3">
                <span id="product-image1-span" class="input-group-text">商品画像1</span>
                <input type="file" name="product_image1" id="product-image1-input" class="form-control">
            </div>
            <!-- 商品画像2 -->
            <div id="product-image2-box" class="input-group mb-3">
                <span id="product-image2-span" class="input-group-text">商品画像2</span>
                <input type="file" name="product_image2" id="product-image2-input" class="form-control">
            </div>
            <!-- 商品画像3 -->
            <div id="product-image3-box" class="input-group mb-3">
                <span id="product-image3-span" class="input-group-text">商品画像3</span>
                <input type="file" name="product_image3" id="product-image3-input" class="form-control">
            </div>
            <!-- 商品画像4 -->
            <div id="product-image4-box" class="input-group mb-3">
                <span id="product-image4-span" class="input-group-text">商品画像4</span>
                <input type="file" name="product_image4" id="product-image4-input" class="form-control">
            </div>
            <!-- 商品画像5 -->
            <div id="product-image5-box" class="input-group mb-3">
                <span id="product-image5-span" class="input-group-text">商品画像5</span>
                <input type="file" name="product_image5" id="product-image5-input" class="form-control">
            </div>
            <!-- 商品画像6 -->
            <div id="product-image6-box" class="input-group mb-3">
                <span id="product-image6-span" class="input-group-text">商品画像6</span>
                <input type="file" name="product_image6" id="product-image6-input" class="form-control">
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
</body>
</html>