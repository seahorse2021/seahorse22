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
    public function store(Request $request,Log $log)
    {
        //dd($log);
        // バリデーション
        $request->validate([
            'comment' => 'required'
        ]);


        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $data = $request->merge(['log_id' => $log->id])->all();

        $result = Comment::create($data);

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
    public function destroy(Comment $comment)
    {
        
        $comment->delete();

        return redirect()
            ->route('log.show', $comment->log);
    }
}
