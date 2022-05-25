<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>購入確定</title>
</head>
<body>
    <!-- ヘッダー部分 -->
    <div class="container">
    <header id="header" class="header">
            @include('common.header')
        </header>

        <main>
            <h1>注文が確定しました。</h1>

            <input type="button" onclick="" value="商品一覧に戻る">
        </main>
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


