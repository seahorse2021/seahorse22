<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider_id',
        'provider_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //自分のuser_idのlogを抽出（1対多）
    public function mylogs()
    {
        return $this->hasMany(Log::class)->orderBy('updated_at', 'desc');
    }

    //logモデルのリレーション（多対多）
    //$user->logs
    public function logs()
    {
        return $this->belongsToMany(Log::class)->withTimestamps();
    }

    //Profileモデルのリレーション（1対1）
    //$user->profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // commentモデルのリレーション（1対多）
    //$user->comments
    public function comments()
    {
        return $this->hasMany(Commment::class);
    }

    //Pictureモデルのリレーション（1対多）
    //$user->picture
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
