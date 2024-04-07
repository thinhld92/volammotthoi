<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'thumbnail',
        'image',
        'image_caption',
        'source',
        'category_id',
        'user_id',
        'published_at',
        'hot_date',
        'new_date',
        'status',
        'seo_alias',
        'seo_title',
        'seo_meta_keywords',
        'seo_meta_description',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }

    public function breadCategory(){
        return $this->belongsTo(Category::class, 'category_id', 'id')->with('parentsCategory');
    }

    public function getPublishedDateAttribute()
    {
        $register_date = date('d-m', strtotime($this->published_at));
        return $register_date;
    }

}
