<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
