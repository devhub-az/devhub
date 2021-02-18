<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Localization extends Model
{
    protected $table = 'localization';

    protected $fillable = [
        'idx',
        'model',
        'ru',
        'en',
        'az',
    ];
}
