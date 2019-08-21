<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Events\Notification;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session(['main-page' => '/']);
        return view('pages.home', ['url' => '/api/posts/top/day']);
    }

    public function indexWeek()
    {
        session(['main-page' => '/top/week']);
        return view('pages.home', ['url' => '/api/posts/top/week']);
    }

    public function indexMonth()
    {
        session(['main-page' => '/top/month']);
        return view('pages.home', ['url' => '/api/posts/top/month']);
    }

    public function all()
    {
        session(['main-page' => '/all']);
        return view('pages.home', ['url' => '/api/posts/all']);
    }

    public function favorite()
    {
        if (Auth::check()) {
            session(['main-page' => '/favorite']);
        }
        return view('pages.home', ['url' => '/api/posts/favorite']);
    }

}
