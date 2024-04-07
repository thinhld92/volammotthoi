<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteConfig extends Model
{
    use HasFactory;

    protected $table = 'website_configs';

    protected $fillable = [
        'config_name',
        'config_value',
        'config_comment',
    ];

}
