<!DOCTYPE html>
<html lang="ja" >
<head>
    <title>投稿一覧</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script><script src="/docs/4.5/assets/js/vendor/anchor.min.js"></script>
    <script src="/docs/4.5/assets/js/vendor/clipboard.min.js"></script>
    <script src="/docs/4.5/assets/js/vendor/bs-custom-file-input.min.js"></script>
    <script src="/docs/4.5/assets/js/src/application.js"></script>
    <script src="/docs/4.5/assets/js/src/search.js"></script>
    <script src="/docs/4.5/assets/js/src/ie-emulation-modes-warning.js"></script>
</head>
<body >
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
        <div class="container">
            <span class="skiplink-text">Skip to main content</span>
        </div>
    </a>

    <div>
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">{{$user->name}}</h1>
        </div>
    </div>

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($compose as $c)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="{{route('show',['id' => $c->id])}}">
                                    <img src="../../uploads/{{$c->image}}" class="card-img-top" alt="Card image cap" width="300" height="200">
                                </a>

                                <div class="card-body">
                                    <p class="card-text">{{$c->title}}</p>
                                    <p class="card-text">{{$c->point}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            @if($c->user_id == Auth::id())
                                                <a href="{{route('edit',['id' => $c->id])}}" class="btn btn-sm btn-outline-secondary">編集</a>
                                                <form method="POST" action="{{route('delete',['id'=>$c->id])}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">削除</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>
</html>