<!DOCTYPE html>
<html lang="ja" >
<head>
    <title>詳細画面</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" >
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class='container'>
        <h1>詳細画面</h1>
        <div class="contents">
            <h2 class="name">タイトル</h2>
            <h2 class="content">{{$compose->title}}</h2>
        </div>

        <div class="contents">
            <h2 class="name">スクリーンショット</h2>
            <img src="../../uploads/{{$compose->image}}" class="card-img-top img" alt="Card image cap">
        </div>

        <div class="contents">
            <h2 class="name">おすすめポイント</h2>
            <h2 class="content">{{$compose->point}}</h2>
        </div>


        <div class="back">
            <a class="btn btn-primary" href="{{route('index')}}">戻る</a>
        </div>
    </div>
</body>
</html>