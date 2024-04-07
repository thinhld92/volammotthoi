<?php

namespace App\Models;

use App\Enums\BannerType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'link',
        'type',
        'start_date',
        'end_date',
        'end_date',
        'status',
    ];

    public function getTypeNameAttribute(){
        // dd($this->status);
        return __(BannerType::getKey((int) $this->type));
    }

}
