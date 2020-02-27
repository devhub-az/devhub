<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubsCollection;
use App\Models\Hub;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View|void
     */
    public function postsApiRoute(Request $request)
    {
        $top_followed_hubs = new HubsCollection(Hub::take(6)->get());
        switch ($request->path()) {
            case '/':
                session(['main-page' => '/']);

                return view('pages.home', ['url' => '/api/posts/top/day', 'top_followed_hubs' => $top_followed_hubs,]);
            case 'top/week':
                session(['main-page' => '/top/week']);

                return view('pages.home', ['url' => '/api/posts/top/week', 'top_followed_hubs' => $top_followed_hubs,]);
            case 'top/month':
                session(['main-page' => '/top/month']);

                return view('pages.home',
                    ['url' => '/api/posts/top/month', 'top_followed_hubs' => $top_followed_hubs,]);
            case 'all':
                session(['main-page' => '/all']);

                return view('pages.home', ['url' => '/api/posts/all', 'top_followed_hubs' => $top_followed_hubs,]);
            case 'favorite' && \Auth::user()->getHubsIds() !== null && \Auth::user()->getUserIds() !== null:
                session(['main-page' => '/favorite']);

                return view('pages.home', ['url' => '/api/posts/favorite', 'top_followed_hubs' => $top_followed_hubs,]);
            default:
                return abort(404);
        }
    }
}
