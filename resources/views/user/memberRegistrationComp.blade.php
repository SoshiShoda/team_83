<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>会員情報登録完了</title>
</head>
<body>
    <!-- ヘッダー部分 -->
    <div class="header">
        <header id="header" class="wrapper">
            <h1 class="site-title">
                <p>demosite</p>
            </h1>
        </header>

        <div class="ham" id="ham"> <!--ハンバーガーメニュー-->
            <span class="ham_line ham_line1"></span>
            <span class="ham_line ham_line2"></span>
            <span class="ham_line ham_line3"></span>
        </div>

        <div class="menu-wrapper" id="menu-wrapper">
            <nav class="navi" id="navi">
                <ul class="nav-menu">
                    <li><a href="">ログイン</a></li>
                    <li><a href="">マイページ</a></li>
                    <li><a href="">商品一覧</a></li>
                    <li><a href="">カート</a></li>
                    <li><a href="">レビュー</a></li>
                </ul>
            </nav>
        </div>

        <div class="toggle_btn">
            <span></span>
            <span></span>
        </div>
    </div>

    <div>
        <h1>登録が完了しました!</h1>
    </div>
    
    <!-- トップに戻るボタン -->
    <div>
        <input type="button" onclick="" value="トップに戻る">
    </div>

    <style>
        .header{
            display: flex;
            width: 100%;
            height: 100px;
            background-color: darkgrey;
            align-items: center;
        }

        .navi .nav-menu{
            list-style: none;
            padding: 10px;
            position: absolute;
            right: 10px;
        }

        .ham {
            position: relative;
            width: 40px;
            height: 40px;
            cursor: pointer;
            background-color: darkgrey;
            border: solid 1px #000000;
            border-radius: 10%;
            margin-left: 80%;
        }
        .ham_line {
            position: absolute;
            left: 10px;
            width: 20px;
            height: 1px;
            background-color: #333333;
        }
        .ham_line1 {
            top: 10px;
        }
        .ham_line2 {
            top: 18px;
        }
        .ham_line3 {
            top: 26px;
        }
        .clicked .ham_line1 {
            transform: rotate(45deg);
            top: 20px;
        }
        .clicked .ham_line2 {
            width: 0px;
        }
        .clicked .ham_line3 {
            transform: rotate(-45deg);
            top: 20px;
        }
        .navi {
            position: fixed;
            width: 300px;
            height: 300px;
            left: -400px;
            background-color: aquamarine;
            transition: all 0.3s;
        }
        .clicked .navi {
            left: 0px;
        }
    </style>
    <script>
        const ham = document.getElementById('ham');
        const menu_wrapper = document.getElementById('menu-wrapper');
        ham.addEventListener('click', function() {
            ham.classList.toggle('clicked');
            menu_wrapper.classList.toggle('clicked');
        });
    </script>
</body>
</html>