<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostsVotes extends Model
{
    protected $table = 'post_votes';

    protected $fillable = [
        'user_id',
        'post_id',
        'status',
    ];

}
