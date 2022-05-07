<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>レビュー編集ページ</title>
</head>
<body>
    <h2>レビュー編集ページ</h2>
    <form method="post" action="">
        <div class="review-item">
            <label for="">商品ID</label>
            <!-- 商品ID自動表示 -->
        </div>
        <div>
            <label for="">満足度</label>
            <select name="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div>
            <label for="">レビュー内容<br>（最大191文字）</label>
            <textarea name="" id="" class="" placeholder="既存のデータを表示させるようにする"></textarea>
        </div>
        <div>
            <button type="submit" class="">更新する</button>
        </div>
    </form>
</body>
</html>