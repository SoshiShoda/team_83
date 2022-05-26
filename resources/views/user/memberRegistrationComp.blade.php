<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>会員情報登録完了</title>
    </head>
    <body>     
        <header id="header" class="wrapper">
            @include('common.header')
        </header>
        <h1>登録が完了しました!</h1>
        <a href="{{ url('login') }}">ログイン画面に戻る</a>
        <script src="{{ asset('/js/header.js') }}"></script>
    </body>
</html>