<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'category_id'];
    // protected $guarded = [];
    // protected $table = 'post';
    public function scopeLatestFirst()
    {
        return $this->latest()->first();
    }

    public function scopeLatestPost()
    {
        return $this->latest()->get();
    }

    public function category()
    {
        // return $this->hasOne(Category::class);
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
