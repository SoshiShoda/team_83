<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- ヘッダー部分 -->
    <header id="header" class="wrapper">
        @include('common.header')
    </header>
    <div>
        <div>
            <a href="{{ route('buy_index') }}">販売管理</a>
        </div>
        <div>
            <a href="{{ route('inventory_management') }}">在庫検索</a>
        </div>
        <div>
            <a href="{{ route('purchases') }}">仕入れ一覧</a>
        </div>
    </div>
    <script src="{{ asset('/js/header.js') }}"></script>
</body>

</html>
