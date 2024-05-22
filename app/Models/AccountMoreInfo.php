<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountMoreInfo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cAccName',
        'cPassWord',
        'cSecPassword',
        'registerIP',
    ];
}
