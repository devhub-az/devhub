<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

//    public function __construct()
//    {
//        if (\Cookie::get('message') === null) {
//            \Cookie::make('message', 'This is a message!', 1);
//            \Cookie::make('alert-class', 'alert-info');
//        }
//        if (!\Session::has('message')) {
//            \Session::flash('message', 'This is a message!');
//            \Session::flash('alert-class', 'alert-info');
//        }
//    }
}
