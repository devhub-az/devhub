<?php

namespace App\Http\Controllers;

use App\Services\Contributors;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AboutController
{
    /**
     * @param Contributors $allContributors
     * @return Factory|View|Application
     */
    public function index(Contributors $allContributors): Factory|View|Application
    {
        $contributors  = $allContributors->get();
        return view('pages.about_us', compact('contributors'));
    }
}
