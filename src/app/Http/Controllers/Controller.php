<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        if (\Cookie::get('message') === null){
            \Cookie::make('message', 'This is a message!', 1);
            \Cookie::make('alert-class', 'alert-info');
        }
//        if (!\Session::has('message')){
//            \Session::flash('message', 'This is a message!');
//            \Session::flash('alert-class', 'alert-info');
//        }
    }

    protected function jsonResponse($data, $code = 200)
    {
        return response()->json($data, $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
