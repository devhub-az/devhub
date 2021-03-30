<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorsResource;
use App\Http\Resources\HubsResource;
use App\Models\Hub;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function articlesApiRoute(Request $request)
    {
        $lastAuthors = new AuthorsResource(User::orderBy('created_at', 'DESC')->take(5)->get());
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
                        'lastAuthors'       => $lastAuthors,
                    ]
                );
            case 'top/week':
                session(['main-page' => '/top/week']);

                return view(
                    'pages.home',
                    ['url'                  => '/api/articles/filter/week',
                        'top_followed_hubs' => $top_followed_hubs,
                        'lastAuthors'       => $lastAuthors,
                    ]
                );
            case 'top/month':
                session(['main-page' => '/top/month']);

                return view(
                    'pages.home',
                    ['url'                  => '/api/articles/filter/month',
                        'top_followed_hubs' => $top_followed_hubs,
                        'lastAuthors'       => $lastAuthors,
                    ]
                );
            case 'all':
                session(['main-page' => '/all']);

                return view(
                    'pages.home',
                    [
                        'url'               => '/api/articles',
                        'top_followed_hubs' => $top_followed_hubs,
                        'lastAuthors'       => $lastAuthors,
                    ]
                );
            case 'favorite' && Auth::user()->followings(Hub::class)->count() !== null
                && Auth::user()
                    ->followings()
                    ->count() !== null:
                session(['main-page' => '/favorite']);

                return view(
                    'pages.home',
                    ['url'                  => '/api/articles/filter/favorite',
                        'top_followed_hubs' => $top_followed_hubs,
                        'lastAuthors'       => $lastAuthors,
                    ]
                );
            default:
                abort(404);
        }

        return response("User can't perform this action.", 500);
    }
}
