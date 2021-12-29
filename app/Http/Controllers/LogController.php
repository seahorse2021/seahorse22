<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Validatorの読み込み
use Illuminate\Support\Facades\Validator;
//Logモデルの読み込み
use App\Models\Log;


class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //関数実行、取得した情報を$logに代入
        $logs = Log::getAllOrderByUpdated_at();
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
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'dive_site' => 'required',
            'dive_time' => 'required',
            'temp' => 'required',
            'message' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('log.create')
                ->withInput()
                ->withErrors($validator);
        }
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Log::create($request->all());
        // ルーティング「log.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('log.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //受け取った ID の値でテーブルからデータを取り出して$logに代入
        $log = Log::find($id);
        //$logをlog.showに渡す
        return view('log.show', ['log' => $log]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, $id)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'dive_site' => 'required',
            'dive_time' => 'required',
            'temp' => 'required',
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
    public function destroy($id)
    {
        //log_tableからidが一致しているものを削除
        $result = Log::find($id)->delete();
        //log.indexへ戻る
        return redirect()->route('log.index');
    }
}
