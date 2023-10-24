@extends('layouts.app')
@section('content')
        <div class='container'>

        <!-- <form action="{{ url('/posts/search') }}" method="GET">
            <input type="text" name="query" placeholder="キーワードを入力">
            <button type="submit">検索</button>
        </form> -->

            <h2 class='page-header'>投稿一覧</h2>
            @if ($searchMessage)
                <p>{{ $searchMessage }}</p>
            @endif
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

                    <td><a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a></td>
                    <td><a class="btn btn-danger" href="/post/{{ $list->id }}/delete"onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
                    </tr>
                @endforeach
                </table>
        </div>
        @endsection