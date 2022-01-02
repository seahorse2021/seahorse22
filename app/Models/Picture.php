<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //logモデルのリレーションリレーション（logモデルに属する）
    // $picture->log
    public function log()
    {
        return $this->belongsTo(Log::class);
    }

    //userモデルのリレーションリレーション（userモデルに属する）
    //$picture->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
