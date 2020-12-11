<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubsResource;
use App\Models\Hub;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function postsApiRoute(Request $request): Application|Factory|View
    {
        $top_followed_hubs = new HubsResource(Hub::take(6)->get());
        switch ($request->path()) {
            case '/':
                session(['main-page' => '/']);

                return view('pages.home', ['url' => '/api/articles/filter/day', 'top_followed_hubs' => $top_followed_hubs]);
            case 'top/week':
                session(['main-page' => '/top/week']);

                return view('pages.home', ['url' => '/api/articles/filter/week', 'top_followed_hubs' => $top_followed_hubs]);
            case 'top/month':
                session(['main-page' => '/top/month']);

                return view(
                    'pages.home',
                    ['url' => '/api/articles/filter/month', 'top_followed_hubs' => $top_followed_hubs]
                );
            case 'all':
                session(['main-page' => '/all']);

                return view('pages.home', ['url' => '/api/articles', 'top_followed_hubs' => $top_followed_hubs]);
            case 'favorite' && \Auth::user()->followings(Hub::class)->count() !== null && \Auth::user()->followings()->count() !== null:
                session(['main-page' => '/favorite']);

                return view('pages.home', ['url' => '/api/articles/favorite', 'top_followed_hubs' => $top_followed_hubs]);
            default:
                abort(404);
        }
    }
}
