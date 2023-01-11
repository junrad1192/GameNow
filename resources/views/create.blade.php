<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新規投稿</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
        <h1>新規投稿</h1>
        <div class="mb-2">
            <label class="form-label" for="title">タイトル</label>
            <input class="form-control" type="text" name="title" value="{{old("title")}}">
            <p style="color:red;">@error('title')
                {{$message}}
            </p>@enderror
        </div>

        <div class="mb-2">
            <label class="form-label" for="image" accept="image/png,image/jpeg,image/jpg">スクリーンショット</label>
            <input class="form-control" type="file" name="image" value="{{old("image")}}">
            <p style="color:red;">@error('image')
                {{$message}}
            </p>@enderror
        </div>
    
        <div class="mb-2">
            <laravel class="form-label" for="point">おすすめポイント</laravel>
            <textarea class="form-control" name="point" rows="5">{{old('point')}}</textarea>
            <p style="color:red;">@error('point')
                {{$message}}
            </p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        <a class="btn btn-primary" href="{{route('index')}}">戻る</a>
    </form>
</div>
</body>
</html>