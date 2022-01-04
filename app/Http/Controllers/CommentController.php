<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Validatorの読み込み
use Illuminate\Support\Facades\Validator;
//認証の読み込み
use Illuminate\Support\Facades\Auth;
//Logモデルの読み込み
use App\Models\Log;
//userモデルの読み込み
use App\Models\User;
//Commentモデルの読み込み
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //コメント投稿の関数
    public function store(Request $request,Log $log)
    {
        // バリデーション
        $request->validate([
            'comment' => 'required'
        ]);

        // 現在ログインしているユーザーのidとログのidをマージ
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $data = $request->merge(['log_id' => $log->id])->all();

        //DB保存
        $result = Comment::create($data);

        // 元のページへ戻る
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //コメント削除の関数
    public function destroy(Comment $comment)
    {
        //コメント削除のコード
        $comment->delete();
        //ログ詳細ページへ戻る
        return redirect()
            ->route('log.show', $comment->log);
    }
}
