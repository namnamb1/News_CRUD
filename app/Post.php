<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'create_by', 'image'];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_posts', 'post_id', 'category_id');
    }

    public function hasCategory()
    {
        return $this->hasMany(CategoryPost::class,'post_id');
    }
}
