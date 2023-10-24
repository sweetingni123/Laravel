<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $list = DB::table('posts')->get();
        return view('posts.index',['lists'=>$list]);
    }

    public function createForm()
    {
    $user = Auth::user();
    return view('posts.createForm', ['user' => $user]);
    }

    public function create(CreatePostRequest $request)
{
    // バリデーションを通過した場合の処理
    $user = Auth::user();
    $contents = $request->input('newPost');
    DB::table('posts')->insert([
        'user_name' => $user->name,
        'contents' => $contents
    ]);

    return redirect('/index');
}
    // public function create(Request $request)
    // {
    // $rules = [
    //     'newPost' => 'required|string|max:100',
    // ];
    // $messages = [
    //     'newPost.required' => '投稿内容は必須です。',
    //     'newPost.string' => '投稿内容は文字列で入力してください。',
    //     'newPost.max' => '投稿内容は100文字以内で入力してください。',
    // ];
    // $request->validate($rules, $messages);

    // // $validator = Validator::make($request->all(), $rules, $messages);

    // // if ($validator->fails()) {
    // //     return redirect('/create-form')
    // //         ->withErrors($validator)
    // //         ->withInput();
    // // }

    // $user = Auth::user();
    // $contents = $request->input('newPost');
    // DB::table('posts')->insert([
    // 'user_name' => $user->name,
    // 'contents' => $contents
    // ]);

    // return redirect('/index');
    // }

    public function updateForm($id)
    {
    $contents = DB::table('posts')
    ->where('id', $id)
    ->first();
    return view('posts.updateForm', ['contents' => $contents]);
    }

    public function update(Request $request)
    {
    $id = $request->input('id');
    $up_contents = $request->input('upPost');

    $rules = [
        'upPost' => 'required|string|max:100',
    ];
    $messages = [
        'upPost.required' => '投稿内容は必須です。',
        'upPost.string' => '投稿内容は文字列で入力してください。',
        'upPost.max' => '投稿内容は100文字以内で入力してください。',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect("/post/$id/update-form")
            ->withErrors($validator)
            ->withInput();
    }

    DB::table('posts')
    ->where('id', $id)
    ->update(
    ['contents' => $up_contents]
    );
    return redirect('/index');
    }

    public function delete($id)
    {
    DB::table('posts')
    ->where('id', $id)
    ->delete();
    return redirect('/index');
    }

    public function __construct()
    {
    $this->middleware('auth');
    }

    public function search(Request $request)
    {
    $query = trim($request->input('query'));

    if ($query === '') {
        $results = DB::table('posts')->get();
        $searchMessage = '';
    } else {
    $results = DB::table('posts')->where('contents', 'like', "%$query%")->get();

        if (count($results) === 0) {
            // 検索結果が0件の場合にエラーメッセージを設定
            $searchMessage = '検索結果は0件です。';
        } else {
            $searchMessage = '';
        }
    }
    return view('posts.search', ['lists' => $results, 'searchMessage' => $searchMessage]);
    }

    public function show($id)
    {
    $post = DB::find($id); // または適切な方法で投稿を取得
    if (!$post) {
        return abort(404); // 投稿が存在しない場合、404 エラーを表示
    }
    $user = Auth::user(); // ログインユーザーを取得
    return view('posts.show', compact('post', 'user'));
}
}