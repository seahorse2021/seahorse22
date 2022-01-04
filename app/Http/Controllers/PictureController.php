<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Storegeの読み込み
use Illuminate\Support\Facades\Storage;

//Validatorの読み込み
use Illuminate\Support\Facades\Validator;
//認証の読み込み
use Illuminate\Support\Facades\Auth;
//Logモデルの読み込み
use App\Models\Log;
//userモデルの読み込み
use App\Models\User;
//pictureモデルの読み込み
use App\Models\Picture;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///
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
    public function store(Request $request)
    {
        //
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

     //画像追加画面へ
    public function edit($id)
    {
        $log = Log::find($id);
        return view ('picture.edit', ['log' => $log]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //画像追加処理
    public function update(Request $request, $id)
    {

        // バリデーション
        $validator = Validator::make($request->all(), [
            'picture' => 'required|file|image'
        ]);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('picture.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }

        //リクエストファイルの画像を取得
        $upload_image = $request->file('picture');

        //画像をpublic直下のuploadsに保存し$pathにパスを取得
        $path = $upload_image->store('uploads', "public");

        if ($path) {
            // DBに登録
            $result = Picture::create([
                "picture" => $path,
                "user_id" => Auth::user()->id,
                "log_id" => $id,
            ]);
        }

        //サムネイルの登録
        //idが一致するログのレコードを取得
        $log = Log::find($id);
        //サムネイルがnullだったら$pathを登録
        if($log->thumbnail == null){
            $log->thumbnail = $path;
            $log->save();
        }
        //profile.showへ移動（現在ログインしているユーザー情報）
        return redirect()->route('picture.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //ログの画像を削除する関数
    public function destroy($id)
    {
        //picture_tableからidが一致しているものを取得（画像パス）
        $pic = Picture::find($id);

        //削除する画像がサムネイルの場合はサムネイルのパスを変更
        if($pic->picture == $pic->log->thumbnail){
            Log::find($pic->log_id)->update(['thumbnail' => 'uploads/no_image.png']);
        }

        //ストレージから画像を削除
        Storage::disk('public')->delete($pic->picture);

        //picture_tableからもid削除
        $result = Picture::find($id)->delete();
        //元のページへ戻る
        return redirect()->back();
    }

    //サムネイル変更の関数
    public function change($id)
    {
        $picture = Picture::find($id);
        $result = Log::find($picture->log_id)->update(['thumbnail' => $picture->picture]);

        return redirect()->route('log.show',$picture->log_id);
    }
}
