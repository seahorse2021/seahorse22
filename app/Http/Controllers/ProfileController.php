<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//Validatorの読み込み
use Illuminate\Support\Facades\Validator;
//認証の読み込み
use Illuminate\Support\Facades\Auth;
//userモデルの読み込み
use App\Models\User;
//Profileモデルの読み込み
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$profiles = Profile::all(); 全て取得

        // カードランクごとにデータ取得
        $pro = Profile::where('card_rank', 'Pro')->get();
        $dm = Profile::where('card_rank', 'DM')->get();
        $msd = Profile::where('card_rank', 'MSD')->get();
        $aow = Profile::where('card_rank', 'AOW')->get();
        $ow = Profile::where('card_rank', 'OW')->get();
        return view ('profile.index', [
            'pro' => $pro,
            'dm' => $dm,
            'msd' => $msd,
            'aow' => $aow,
            'ow' => $ow,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //profile.createを表示
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // バリデーション
        $validator = Validator::make($request->all(), [
            'card_rank' => 'required',
            'dive_count' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('profile.create')
                ->withInput()
                ->withErrors($validator);
        }

        //DBに保存
        $result = Profile::create([
            "card_rank" => $request->card_rank,
            "dive_count" => $request->dive_count,
            "profile_image" => 'uploads/null.png',
            "user_id" => Auth::user()->id
        ]);


        // profile.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
    * @param  int  $id
    * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //profle_tableからユーザーidが一致するレコードを取得
        $profile = Profile::where('user_id',$id)->first();
        //profile.indexに$profileと$userを渡す
        return view('profile.show', ['profile' => $profile]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //写真変更ページを表示する
        $profile = Profile::find($id);
        return view('profile.edit', ['profile' => $profile]);

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
        // バリデーション
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|file|image'
        ]);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('profile.show', Auth::user()->id)
                ->withInput()
                ->withErrors($validator);
        }
        //リクエストファイルの画像を取得
        $upload_image = $request->file('profile_image');

        //画像をpublic直下のuploadsに保存し$pathにパスを取得
        $path = $upload_image->store('uploads', "public");

        if ($path) {
        //DBを書き換え
        $result = Profile::find($id)->update(['profile_image' => $path]);
        }
        //profile.showへ移動（現在ログインしているユーザー情報）
        return redirect()->route('profile.show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
