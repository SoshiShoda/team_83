<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <main>
            <div>
                <h1>カスタマーレビュー </h1>
            </div>
            <div>
                <div class="reviw-list">
                    <div class="reviw">
                        <div class="user">
                            <span>ユーザーネーム</span>
                        </div>
                        <div class="content">
                            <p>レビュー内容</p>
                        </div>
                    </div>
                    <div class="reviw">
                        <div class="user">
                            <span>ユーザーネーム</span>
                        </div>
                        <div class="content">
                            <p>レビュー内容</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div>
                フッター
            </div>
        </footer>
    </div>

    <style>
        main {
            background-color: #f1f1f1;
            height: 700px;
            display: flex;
        }
        
        .main{
            margin: auto;
        }
        
        .footer{
            background-color: #f6f6f6;
            height: 100px;
            display: flex; 
        }

        .footer div{
            margin: auto;
        }

        /* ヘッダー */
        .header{
            background-color: white;
            width: 100%;
            height: 100px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
        }

        .header-inner {
            padding: 0 20px; 
            display: flex; 
            align-items: center;
            justify-content: space-between;
            height: inherit; 
            position: relative;
        }
        
        /* ヘッダーのナビ部分 */
        .header_nav {
            position: absolute;
            right: 0;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            transform: translateX(100%); 
            background-color: darkgrey;
            transition: ease .4s; 
        }

        .nav_items {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 0;
        }

        /* ナビのリンク */
        .nav_items a {
            color: black;
            width: 100%;
            display: block;
            text-align: center;
            font-size: 20px;
            margin-bottom: 24px;
            text-decoration: none;
        }

        .nav-items_item:last-child a {
            margin-bottom: 0;
        }

        /* ハンバーガーメニュー */
        .header_hamburger {
            width: 48px;
            height: 50%;
        }

        .hamburger {
            background-color: transparent; 
            border-color: transparent; 
            z-index: 9999;
        }

        /* ハンバーガーメニューの線 */
        .ham_line {
            width: 100%;
            height: 1px;
            background-color: #000;
            position: relative;
            transition: ease .4s; 
            display: block;
        }
        .ham_line1 {
            top: 0px;
        }
        .ham_line2 {
            margin: 8px 0;
        }
        .ham_line3 {
            top: 0px;
        }

        /* ハンバーガーメニュークリック後のスタイル */
        .header_nav.active{
            transform: translateX(0);
        }
        .hamburger.active span:nth-child(1) {
            top: 5px;
            transform: rotate(45deg);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            top: -13px;
            transform: rotate(-45deg);
        } 



    </style>

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