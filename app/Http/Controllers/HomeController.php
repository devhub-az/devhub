<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        session(['main-page' => '/']);
        return view('pages.home', ['url' => '/api/posts/top/day']);
    }

    /**
     * @return Factory|View
     */
    public function indexWeek()
    {
        session(['main-page' => '/top/week']);
        return view('pages.home', ['url' => '/api/posts/top/week']);
    }

    /**
     * @return Factory|View
     */
    public function indexMonth()
    {
        session(['main-page' => '/top/month']);
        return view('pages.home', ['url' => '/api/posts/top/month']);
    }

    /**
     * @return Factory|View
     */
    public function all()
    {
        session(['main-page' => '/all']);
        return view('pages.home', ['url' => '/api/posts/all']);
    }

    /**
     * @return Factory|View
     */
    public function favorite()
    {
        if (\Auth::check()) {
            session(['main-page' => '/favorite']);
        }
        return view('pages.home', ['url' => '/api/posts/favorite']);
    }

}
