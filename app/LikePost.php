<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
