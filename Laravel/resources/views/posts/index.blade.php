<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8"'>
        <link rel='stylesheet' href="{{ asset('/css/app.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <h1>Laravelを使った投稿機能の実装</h1>
        </header> -->

        @extends('layouts.app')
        @section('content')
        <div class='container'>
        <p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>

        <form action="{{ url('/posts/search') }}" method="GET">
            <input type="text" name="query" placeholder="キーワードを入力">
            <button type="submit">検索</button>
        </form>

            <h2 class='page-header'>投稿一覧</h2>
                <table class='table table-hover'>
                    <tr>
                    <th>投稿No</th>
                    <th>ユーザー名</th>
                    <th>投稿内容</th>
                    <th>投稿日時</th>
                    <!-- <th>更新日時</th> -->

                    <th></th>
                    <th></th>
                    </tr>
                @foreach ($lists as $list)
                    <tr>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->user_name }}</td>
                    <td>{{ $list->contents }}</td>
                    <td>{{ $list->created_at }}</td>
                    <!-- <td>{{ $list->updated_at }}</td> -->

                    @if (Auth::check() && $list->user_name === Auth::user()->name)
                    <td><a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a></td>
                    <td><a class="btn btn-danger" href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
                    @else
                        <td></td> <!-- ログイン中のユーザーが投稿者でない場合は空のセル -->
                        <td></td> <!-- ログイン中のユーザーが投稿者でない場合は空のセル -->
                    @endif

                    <!-- <td><a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a></td>
                    <td><a class="btn btn-danger" href="/post/{{ $list->id }}/delete"onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td> -->

                    </tr>
                @endforeach
                </table>
        </div>
        @endsection

        <!-- <footer>
        <small>Laravel@crud.curriculum</small>
    </footer>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    </body>

</html> -->

