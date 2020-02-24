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

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function postRating()
    {
        return $this->post()->where('status', 1)->count() - $this->post()->where('status', 0)->count();
    }
}
