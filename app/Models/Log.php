<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    // アプリケーション側でcreateなどできない値を記述する
    //$guardedはアプリケーション側から変更できないカラムを指定する（ブラックリスト）
    //$fillableはアプリケーション側から変更できるカラムを指定する（ホワイトリスト）．
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function getAllOrderByUpdated_at()
    {
        //selfは Logモデルのこと,orderBy()は SQL のものと同じ理解で OK
        return self::orderBy('updated_at', 'desc')->get();
    }

    //ログモデル（子）はUserモデル（親）に属している
    //$log->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Userモデルと多対多の連携をする
    //$log->users
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    //$logのidに対してのコメント
    //$log->comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
