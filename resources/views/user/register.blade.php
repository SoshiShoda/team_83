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
    <body>
        <header id="header" class="wrapper">
            @include('common.header')
        </header>
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
        <form action="{{ route('user_register_insert') }}" method="post">
            @csrf
            <p>名前</p>
            <input type="textarea" name="user_name" value="{{ old('user_name') }}">
            <p>郵便番号</p>
            <input type="textarea" name="post_code" value="{{ old('post_code') }}">
            <p>都道府県</p>
            <input type="textarea" name="prefecture" value="{{ old('prefecture') }}">
            <p>市区町村番地</p>
            <input type="textarea" name="municipality" value="{{ old('municipality') }}">
            <p>マンション名</p>
            <input type="textarea" name="apartment" value="{{ old('apartment') }}">
            <p>メールアドレス</p>
            <input type="textarea" name="email" value="{{ old('email') }}">
            <p>電話番号</p>
            <input type="textarea" name="phone_number" value="{{ old('phone_number') }}">
            <p>生年月日</p>
            <input type="date" name="birthday" value="{{ old('birthday') }}">
            <p>職業</p>
            <input type="textarea" name="occupation" value="{{ old('occupation') }}">
            <p>性別</p>
            <input type="textarea" name="gender" value="{{ old('gender') }}">
            <p>パスワード</p>
            <input type="password" name="password" >
            <div>
            {{ csrf_field() }}
            <p><button type="submit">登録</button></p>
            </div>
        </form>
        <script src="{{ asset('/js/header.js') }}"></script>
    </body>
</html>