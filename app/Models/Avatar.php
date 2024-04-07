<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $fillable = [
        'cAccName',
        'image'
    ];

    public function getPhotoAttribute()
    {
        $avatar = $this->avatar ?? 'https://ui-avatars.com/api/?name='
        . urlencode($this->cRealName)
        . '&color=7F9CF5&background=EBF4FF&size=256';
        return $avatar;
    }
}
