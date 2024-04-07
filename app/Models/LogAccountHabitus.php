<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAccountHabitus extends Model
{
    use HasFactory;

    protected $fillable = [
        "cAccName",
        "playerindex",
        "gamename",
        "coin",
        "coinchange",
        "ip",
        "logtime",
    ];
}
