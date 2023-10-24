<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8"'>
        <link rel='stylesheet' href='/css/app.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <h1 class='page-header'>Laravelを使った投稿機能の実装</h1>
        </header> -->

        @extends('layouts.app')
        @section('content')

        <div class='container'>
            <h2 class='page-header'>新しく投稿する</h2>
            <p>投稿者: {{ $user->name }}</p>
            {!! Form::open(['url' => '/post/create', 'method' => 'POST']) !!}
            <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容', 'maxlength' => '100']) !!}
            </div>

            @error('newPost')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-success pull-right">追加</button>
            {!! Form::close() !!}
        </div>

        @endsection

        <!-- <footer>
            <small>Laravel@crud.curriculum</small>
        </footer>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html> -->