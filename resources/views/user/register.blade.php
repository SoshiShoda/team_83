<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>登録情報登録ページ</title>
    </head>
    <body class="login">
        <header id="header" class="wrapper">
            @include('common.header')
        </header>
        <div class="text-center">
            <h1>会員登録</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="login-form">
                <form action="{{ route('user_register_insert') }}" method="post">
                    @csrf
                    <p>名前
                    <input type="textarea" class="form-control" name="user_name" value="{{ old('user_name') }}"></p>
                    <p>郵便番号
                    <input type="textarea" class="form-control" name="post_code" value="{{ old('post_code') }}"></p>
                    <p>都道府県
                    <input type="textarea" class="form-control" name="prefecture" value="{{ old('prefecture') }}"></p>
                    <p>市区町村番地
                    <input type="textarea" class="form-control" name="municipality" value="{{ old('municipality') }}"></p>
                    <p>マンション名
                    <input type="textarea" class="form-control" name="apartment" value="{{ old('apartment') }}"></p>
                    <p>メールアドレス
                    <input type="textarea" class="form-control" name="email" value="{{ old('email') }}"></p>
                    <p>電話番号
                    <input type="textarea" class="form-control" name="phone_number" value="{{ old('phone_number') }}"></p>
                    <p>生年月日
                    <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}"></p>
                    <p>職業
                    <input type="textarea" class="form-control" name="occupation" value="{{ old('occupation') }}"></p>
                    <p>性別
                    <input type="textarea" class="form-control" name="gender" value="{{ old('gender') }}"></p>
                    <p>パスワード
                    <input type="password" class="form-control" name="password" ></p>
                    <div>
                    {{ csrf_field() }}
                    <p><button type="submit" class="btn btn-primary mt-3">登録</button></p>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('/js/header.js') }}"></script>
    </body>
</html>