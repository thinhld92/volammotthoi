<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopServer extends Model
{
    use HasFactory;

    protected $fillable = [
        "cAccName",
        "gamename",
        "level",
        "exp",
        "expnext",
        "ip",
        "logtime",
    ];
}
