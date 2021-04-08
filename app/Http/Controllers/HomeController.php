<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorsResource;
use App\Http\Resources\HubsResource;
use App\Models\Hub;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function articlesApiRoute(Request $request): Factory | View | Application
    {
        $top_karma = new AuthorsResource(User::orderBy('karma', 'DESC')->take(5)->get());
        $top_followed_hubs = new HubsResource(
            Hub::withCount('favorites')->orderBy(
                'favorites_count',
                'desc'
            )->take(5)->get()
        );
        switch ($request->path()) {
            case '/':
                session(['main-page' => '/']);

                return view(
                    'pages.home',
                    ['url'                  => '/api/articles/filter/day',
                        'top_followed_hubs' => $top_followed_hubs,
                        'top_karma'         => $top_karma,
                    ]
                );
            case 'top/week':
                session(['main-page' => '/top/week']);

                return view(
                    'pages.home',
                    ['url'                  => '/api/articles/filter/week',
                        'top_followed_hubs' => $top_followed_hubs,
                        'top_karma'         => $top_karma,
                    ]
                );
            case 'top/month':
                session(['main-page' => '/top/month']);

                return view(
                    'pages.home',
                    ['url'                  => '/api/articles/filter/month',
                        'top_followed_hubs' => $top_followed_hubs,
                        'top_karma'         => $top_karma,
                    ]
                );
            case 'all':
                session(['main-page' => '/all']);

                return view(
                    'pages.home',
                    [
                        'url'               => '/api/articles',
                        'top_followed_hubs' => $top_followed_hubs,
                        'top_karma'         => $top_karma,
                    ]
                );
                // TODO:FIX
//            case 'favorite' && Auth::user()->followings(Hub::class)->count() !== null
//                && Auth::user()
//                    ->followings()
//                    ->count() !== null:
//                session(['main-page' => '/favorite']);
//
//                return view(
//                    'pages.home',
//                    ['url'                  => '/api/articles/filter/favorite',
//                        'top_followed_hubs' => $top_followed_hubs,
//                        'top_karma'       => $top_karma,
//                    ]
//                );
            default:
                abort(404);
        }
    }
}
