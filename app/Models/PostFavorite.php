<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostFavorite extends Model
{
    protected $table = 'post_favorites';

    protected $fillable = [
        'follower_id',
        'post_id',
    ];

}