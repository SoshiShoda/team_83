<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
</head>
<body>
    <!-- ヘッダー部分 -->
    <div class="container">
        <header id="header" class="header">   
            <div class="header-inner">
                <h1 class="site-title">
                    <p>demosite</p>
                </h1>

                <button class="header_hamburger hamburger" id="js-hamburger"> <!--ハンバーガーメニュー-->
                    <span class="ham_line ham_line1"></span>
                    <span class="ham_line ham_line2"></span>
                    <span class="ham_line ham_line3"></span>
                </button>

                <nav class="header_nav nav" id="js-nav">
                    <ul class="nav_items nav-items">
                        <li class="nav-items_item"><a href="">ログイン</a></li>
                        <li class="nav-items_item"><a href="">マイページ</a></li>
                        <li class="nav-items_item"><a href="">商品一覧</a></li>
                        <li class="nav-items_item"><a href="">カート</a></li>
                        <li class="nav-items_item"><a href="">レビュー</a></li>
                    </ul>
                </nav>
            </div>          
        </header>

        <!-- 検索 -->
        <main>
            <div>
                <form action="{{ url('productList') }}" method="get">
                    @csfr
                    <input type="text" placeholder="商品を探す" name="keyword">
                    <button type="submit">検索</button>
                </form>
            </div>

            <!-- レビューページ遷移 -->
            <div>
                <h3>
                    <a href="">レビューを見る</a>
                </h3>
            </div>
            <!-- 商品一覧 -->
            <div>
                <ul>
                    <li><a href=""><img src="" /><p>商品名</p><span>円</span></a></li>
                    <li><a href=""><img src="" /><p>商品名</p><span>円</span></a></li>
                    <li><a href=""><img src="" /><p>商品名</p><span>円</span></a></li>
                    <li><a href=""><img src="" /><p>商品名</p><span>円</span></a></li>
                    <li><a href=""><img src="" /><p>商品名</p><span>円</span></a></li>
                </ul>
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