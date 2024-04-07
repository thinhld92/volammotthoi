<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'parent_id', 
        'user_id', 
        'sort_order', 
        'show_to_user', 
        'show_in_menu', 
        'show_in_home', 
        'thumbnail', 
        'status', 
        'seo_alias', 
        'seo_title', 
        'seo_meta_keywords',
        'seo_meta_description', 
        'is_locked'
    ];

    public function parent(){
    	return $this->belongsTo(Category::class, 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');
    }

    public function childrenCategories(){
    	return $this->hasMany(Category::class, 'parent_id', 'id')->with('childrenCategories')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');
    }

    public function getPhotoAttribute()
    {
        $photo = $this->thumbnail ?? 'https://picsum.photos/500/300';
        return $photo;
    }

    public function parentsCategory(){
        return $this->belongsTo(Category::class, 'parent_id')->with('parentsCategory');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function getChildrenCategoriesCountAttribute(){
        return $this->categories()->count();
    }

}
