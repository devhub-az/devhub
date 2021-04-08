<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(): Factory|View|Application
    {
        return view('pages.contact');
    }

    public function send()
    {
        //TODO
    }
}
