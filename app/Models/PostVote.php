<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    protected $table = 'post_votes';

    protected $fillable = [
        'user_id',
        'post_id',
        'status',
    ];
}
