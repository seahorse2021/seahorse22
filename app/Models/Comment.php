<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //コメントモデル（子）はログモデル（親）に属している
    // $comment->log
    public function log()
    {
        return $this->belongsTo(Log::class);
    }

    //コメントモデル（子）はユーザーモデル（親）に属している
    //$comment->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
