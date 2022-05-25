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
</head>
<body>
    <!-- ヘッダー部分 -->
    <div class="container">
        <header id="header" class="header">
            @include('common.header')
        </header>

        <!-- 注文画面 -->
        <main>
            <div>
                <div>
                    <div>
                        <div>
                            <h1>注文内容の確認<span>計点</span></h1>
                        </div>
                        <div>
                            <!-- 商品名など -->
                        </div>
                    </div>
                    <div>
                        <h1>品代<span>円</span></h1>
                        <h1>送料<span>円</span></h1>
                        <h1>合計<span>円</span></h1>
                    </div>
                </div>
                <div>
                    <div>
                        <h1>お客様情報</h1>
                    </div>
                    <div>
                        <div>
                            <h1>お届け先</h1>
                        </div>
                        <div>
                            <h1>お支払い方法</h1>
                        </div>
                    </div>
                </div>
                <!-- 注文確定ボタン -->
                <div>
                    <input type="button" onclick="" value="注文を確定する">
                </div>
            </div>
        </main>
        
        <footer class="footer">
            <div>
                フッター
            </div>
        </footer>
    </div>
</body>
</html>

