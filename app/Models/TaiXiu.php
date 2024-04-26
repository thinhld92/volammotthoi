<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiXiu extends Model
{
    use HasFactory;
    protected $fillable = [
        "playerindex",
        "cAccName",
        "gamename",
        "coin",
        "dice1",
        "dice2",
        "dice3",
        "total",
        "result",
        "datcuoc",
        "tiencuoc",
        "tienthuong",
        "logtime",
    ];

    
}
