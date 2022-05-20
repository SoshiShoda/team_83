<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>レビュー登録ページ</title>
</head>
<body>
    <h2>レビュー登録ページ</h2>
    <div>
        <form method="post" action="{{route('review_add',['user_id' => $user_id ,'product_id' => $product_id])}}" enctype="multipart/form-data">
            @csrf
            <div>
                @if($product_id->product_image1 !=null)
                    <p><img src="{{ \Storage::url($product_id->product_image1)}}" class="rounded" alt="商品画像" width="5%"><span>{{ $product_id->product_name }}</span> </p>
                @else
                    <p><img src="{{ \Storage::url('public/review/no_image.png') }}" class="rounded" alt="" width="5%"><span>{{ $product_id->product_name }}</span> </p>
                @endif
            </div>
            <div>
                <label for="">満足度</label>
                <select name="review_rating">
                    <option hidden>選択してください</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="">レビュー内容<br>（最大191文字）</label>
                <textarea name="review_text" id="" class="" placeholder="こちらにレビュー内容を記載してください。"></textarea>
                <div class="bottom-area">
                    <label for="">画像</label>
                    <input type="file" name="review_image">
                </div>
                {{ csrf_field() }}
                <button type="submit" >登録する</button>
            </div>
        </form>
    </div>
</body>
</html>