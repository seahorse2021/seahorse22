<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    //Userモデルのリレーション（1対1）
    //$profile->user
    public function user()
    {
        return $this->hasOne(User::class);
    }


}
