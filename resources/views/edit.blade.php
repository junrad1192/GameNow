<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>編集</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <form method="POST" action="{{route('update',['id' => $compose->id])}}" enctype="multipart/form-data">
    @csrf
        <h1>投稿編集</h1>
        <div class="mb-2">
            <label class="form-label" for="title">タイトル</label>
            <input class="form-control" type="text" name="title" value="{{$compose->title}}">
            <p style="color:red;"> 
                @error('title')
                    {{$message}}
                @enderror
            </p> 
        </div>

        <div class="mb-2">
            <label class="form-label" for="image" accept="image/png,image/jpeg,image/jpg">ファイルを選択</label>
            <input class="form-control" type="file" name="image" value="{{$compose->image}}"">
            <p style="color:red;"> 
                @error('image')
                    {{$message}}
                @enderror
            </p> 
        </div>
 
        <div class="mb-2">
            <label class="form-label" for="description">おすすめポイント</label>
            <textarea class="form-control" name="point" rows="5">{{($compose->point)}}</textarea>
            <p style="color:red;"> 
                @error('point')
                    {{$message}}
                @enderror
            </p>
        </div>

        <button class="btn btn-primary" type="submit" >更新</button>
        <a class="btn btn-primary" href="{{route('index')}}">戻る</a>
    </form>
</div>
</body>
</html>