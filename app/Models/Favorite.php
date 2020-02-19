<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'follower_id',
        'favoritable_id',
    ];

    public function favoritable()
    {
        return $this->morphTo();
    }
}
