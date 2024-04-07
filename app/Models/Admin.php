<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'group_id',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin(){
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function getPhotoAttribute()
    {
        $avatar = $this->avatar ?? 'https://ui-avatars.com/api/?name='
        . urlencode($this->username)
        . '&color=7F9CF5&background=EBF4FF&size=256';
        return $avatar;
    }
}
