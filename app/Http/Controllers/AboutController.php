<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AboutController
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory | View | Application
    {
        return view('pages.about_us');
    }
}
