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
        //ログイン中のユーザーIDを取得
        $login_id = Auth::user()->id;
        //profle_tableからユーザーidが一致するレコードを取得
        $profile = Profile::find($login_id);
        //user_tableからユーザーidが一致するレコードを取得
        $user = User::find($login_id);
        //profile.indexに$profileと$userを渡す
        return view('profile.index', ['profile' => $profile,'user' => $user]);
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
            'profile_image' => 'required|file|image',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('profile.create')
                ->withInput()
                ->withErrors($validator);
        }
        //リクエストファイルの画像を取得
        $upload_image = $request->file('profile_image');

        //画像をpublic直下のuploadsに保存し$pathにパスを取得
        $path = $upload_image->store('uploads', "public");

        if ($path) {
            //DBに保存
            $result = Profile::create([
                "card_rank" => $request->card_rank,
                "dive_count" => $request->dive_count,
                "profile_image" => $path,
                "user_id" => Auth::user()->id
            ]);
        }

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
    public function destroy($id)
    {
        //

    }
}
