<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>登録情報編集ページ</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<form action="{{ route('user_update',['user_id'=>$user_id]) }}" method="post">
    @csrf
    <p>名前</p>
    <input type="textarea" name="user_name" value="{{ $user_id->user_name }}">
    <p>郵便番号</p>
    <input type="textarea" name="post_code" value="{{ $user_id->post_code }}">
    <p>都道府県</p>
    <input type="textarea" name="prefecture" value="{{ $user_id->prefecture }}">
    <p>市区町村番地</p>
    <input type="textarea" name="municipality" value="{{ $user_id->municipality }}">
    <p>マンション名</p>
    <input type="textarea" name="apartment" value="{{ $user_id->apartment }}">
    <p>メールアドレス</p>
    <input type="textarea" name="email" value="{{ $user_id->email }}">
    <p>電話番号</p>
    <input type="textarea" name="phone_number" value="{{ $user_id->phone_number }}">
    <p>生年月日</p>
    <input type="date" name="birthday" value="{{ $user_id->birthday }}">
    <p>職業</p>
    <input type="textarea" name="occupation" value="{{ $user_id->occupation }}">
    <p>性別</p>
    <input type="textarea" name="gender" value="{{ $user_id->gender }}">
    <p>パスワード</p>
    <input type="password" name="password" value="{{ $user_id->password }}">
    <!-- <p>パスワード確認</p>
    <input type="password" name="password2"value=""> -->
    <div>
    {{ csrf_field() }}
    <p><button type="submit">更新</button></p>
    </div>

</form>
</body>
</html>