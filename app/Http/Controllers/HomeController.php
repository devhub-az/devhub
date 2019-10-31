<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function postsApiRoute(Request $request)
    {
        switch ($request->path()) {
            case '/':
                session(['main-page' => '/']);
                return view('pages.home', ['url' => '/api/posts/top/day']);
            case 'top/week':
                session(['main-page' => '/top/week']);
                return view('pages.home', ['url' => '/api/posts/top/week']);
            case 'top/month':
                session(['main-page' => '/top/month']);
                return view('pages.home', ['url' => '/api/posts/top/month']);
            case 'all':
                session(['main-page' => '/all']);
                return view('pages.home', ['url' => '/api/posts/all']);
            case 'favorite':
                session(['main-page' => '/favorite']);
                return view('pages.home', ['url' => '/api/posts/favorite']);
        }
        return abort(404);
    }

}
