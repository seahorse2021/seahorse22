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

    //自分のuser_idのlogを抽出
    public function mylogs()
    {
        return $this->hasMany(Log::class)->orderBy('updated_at', 'desc');
    }

    //logモデルと多対多の連携をすることを示す
    //$user->logs
    public function logs()
    {
        return $this->belongsToMany(Log::class)->withTimestamps();
    }

    // 投稿者は複数のコメントを持つ。
    //$user->comments
    public function comments()
    {
        return $this->hasMany(Commment::class);
    }
}
