<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'level'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
