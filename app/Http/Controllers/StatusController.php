<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class StatusController extends Controller
{
    public function ping()
    {
        return 'pong';
    }
}
