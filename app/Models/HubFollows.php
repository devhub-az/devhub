<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HubFollows extends Model
{
    protected $table = 'hub_followers';

    protected $fillable = [
        'follower_id',
        'hub_id',
    ];

}