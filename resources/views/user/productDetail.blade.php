<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>productRegister</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- メインボックス -->
            <div class="main col-8 bg-danger">main
                <p>商品名</p>
                <div class="main-picture-box text-center">
                    <img class="w-100" src="https://picsum.photos/1000/1000" alt="mainPicture">
                </div>
                <div class="sub-pictures-box">
                    <div class="sub-pictures text-center row row-cols-3">
                        <a class="sub-picture" href="">
                            <img src="https://picsum.photos/200" alt="">
                        </a>
                        <a href="">
                            <img src="https://picsum.photos/200" alt="">
                        </a>
                        <a href="">
                            <img src="https://picsum.photos/200" alt="">
                        </a>
                        <a href="">
                            <img src="https://picsum.photos/200" alt="">
                        </a>
                        <a href="">
                            <img src="https://picsum.photos/200" alt="">
                        </a>
                        <a href="">
                            <img src="https://picsum.photos/200" alt="">
                        </a>
                    </div>
                </div>
                <button type="button" class="btn btn-primary button-for-buy-page">購入画面へ</button>
            </div>

            <!-- 商品選択ボックス -->
            <div class="for-buy col-4 bg-info">forBuy
                <p class="bg-light product-name text-center">商品名</p>
                <p class="bg-light product-price text-center">価格</p>
                <p class="bg-light product-detail text-center">商品説明</p>
                <div class="select-size-box">
                    <div class="row row-cols-2 size-s">
                        <div class="size-description">
                            <p>S/在庫あり</p>
                        </div>
                        <div class="size-btn">
                            <button type="button" class="btn btn-light">カートに追加</button>
                        </div>
                    </div>
                    <div class="row row-cols-2 size-m">
                        <div class="size-description">
                            <p>M/在庫あり</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-light">カートに追加</button>
                        </div>
                    </div>
                    <div class="row row-cols-2 size-L">
                        <div class="size-description">
                            <p>L/在庫あり</p>
                        </div>
                        <div class="size-btn">
                            <button type="button" class="btn btn-light">カートに追加</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- スタイル -->
    <style>

    </style>
</body>
</html>