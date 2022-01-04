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
//Profileモデルの読み込み
use App\Models\Profile;
//pictureモデルの読み込み
use App\Models\Picture;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //ログの一覧表示の関数
    public function index()
    {
        //関数実行、取得した情報を$logに代入
        $logs = Log::getAllOrderByDate();
        //log.indexに取得した$logを渡す
        return view('log.index', [
            'logs' => $logs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //ログ入力画面を表示
    public function create()
    {
        //log.create（登録ページ）を表示
        return view('log.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //ログ登録の関数
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'dive_site' => 'required',
            'temp' => 'required',
            'add_dive' => 'required',
            'dive_time' => 'required',
            'message' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('log.create')
                ->withInput()
                ->withErrors($validator);
        }


        // 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
        //Auth::user()->idで現在ログインしているユーザの ID を取得することができる
        //Auth::user()には他にもデータが入っている
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        // 戻り値は挿入されたレコードの情報
        // create()は最初から用意されている関数
        $result = Log::create($data);

        $profile = Profile::find($result->user_id);
        $profile->increment('dive_count', $request->add_dive);

        // ルーティング「log.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('picture.edit',$result->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //ログの詳細表示の関数
    public function show($id)
    {
        //受け取った ID の値でテーブルからデータを取り出して$logに代入
        $log = Log::find($id);
        //$logをlog.showに渡す
        return view('log.show', ['log' => $log]);

        //Eagerロード練習

        // $log = Log::with(['log','comment','user'])
        // ->where('log.id',$id)
        // ->get();

        // return view('log.show', ['log' => $log]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //ログ編集画面を表示
    public function edit($id)
    {
        //log_tableからidが一致しているものを$idに代入
        $log = Log::find($id);
        //log.editに取得した$logを渡す
        return view('log.edit', ['log' => $log]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //ログ更新の関数
    public function update(Request $request, $id)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'dive_site' => 'required',
            'temp' => 'required',
            'dive_time' => 'required',
            'message' => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('log.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }
        //データ更新処理
        // updateは更新する情報がなくても更新が走る（updated_atが更新される）
        $result = Log::find($id)->update($request->all());
        // fill()save()は更新する情報がない場合は更新が走らない（updated_atが更新されない）
        // $redult = Log::find($id)->fill($request->all())->save();
        return redirect()->route('log.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //ログ削除の関数
    public function destroy($id)
    {
        //log_tableからidが一致しているものを削除
        $result = Log::find($id)->delete();
        //log.indexへ戻る
        return redirect()->route('log.index');
    }

    //自分のログを表示する関数
    public function mydata()
    {
        // Userモデルに定義したmylogs関数を実行する．
        //結果を$logsに受け取る
        $logs = User::find(Auth::user()->id)->mylogs;
        //$logをlog.indexに渡す
        return view('log.index', [
            'logs' => $logs
        ]);
    }
}
