<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "Account_Info";
    protected $primaryKey = 'iid';
    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->cPassWord;
    }

    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }

    public function getRememberTokenName()
    {
        return null; // not supported
    }

    /**
     * Overrides the method to ignore the remember token.
    */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cAccName',
        'cPassWord',
        'cSecPassword',
        'cRealName',
        'dBirthDay',
        'cArea',
        'cIDNum',
        'dRegDate',
        'cPhone',
        'iClientID',
        'dLoginDate',
        'dLogoutDate',
        'iTimeCount',
        'cQuestion',
        'cAnswer',
        'cSex',
        'cDegree',
        'cEMail',
        'iLock',
        'gCode',
        'nMac',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'cPassWord',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function account_habitus(){
        return $this->hasOne(AccountHabitus::class, 'cAccName', 'cAccName');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'cAccName', 'cAccName');
    }

    public function avatar()
    {
        return $this->hasOne(Avatar::class, 'cAccName', 'cAccName');
    }

    public function getRegisterDateAttribute()
    {
        $register_date = date('d/m/Y H:i:s', strtotime($this->dRegDate));
        return $register_date;
    }

    public function getPhotoAttribute()
    {
        $avatar = $this->avatar->image ?? 'https://ui-avatars.com/api/?name='
        . urlencode($this->cRealName)
        . '&color=7F9CF5&background=EBF4FF&size=256';
        return $avatar;
    }

    public static function sendMessageToTelegram($message){
        $token = "6351735984:AAGQtpXHx9ZGqQHYTOOnHfMpMBE2oQaeRv4";
        $url = "https://api.telegram.org/bot".$token."/sendMessage";
        $options = ['verify'=>false];
        $response = Http::withOptions($options)->post($url, [
            'chat_id' => '@volamkysu',
            'text' => $message,
        ]);
    }

    public static function sendPhotoToTelegram($message, $photo){
        $token = "6351735984:AAGQtpXHx9ZGqQHYTOOnHfMpMBE2oQaeRv4";
        $url = "https://api.telegram.org/bot".$token."/sendPhoto";
        $options = ['verify'=>false];
        $response = Http::withOptions($options)->post($url, [
            'chat_id' => '@volamkysu',
            'photo' => $photo,
            'caption' => $message,
        ]);
    }

}
