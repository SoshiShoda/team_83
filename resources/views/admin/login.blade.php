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
    <div>
        <h1>ログイン</h1>
        <div>
            <form action="{{ url('login/check')}}" method="post">
                @csrf

                <!-- エラー表示用 -->
                @if(isset($message))
                    <p class="message">{{$message}}</p>
                @endif
                
                <input type="email" name="email" value="{{ $email ?? '' }}" placeholder="メールアドレス"  required autofocus><br>
                <input type="password" name="password" value="{{ $password ?? '' }}" placeholder="パスワード" required><br>
                <button class="btn login" type="submit">ログイン</button>
            </form>
        </div>
    </div>
</body>

</html>
