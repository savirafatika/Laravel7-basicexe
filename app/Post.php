<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body'];
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
}
