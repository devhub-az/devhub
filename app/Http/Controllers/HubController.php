<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubResource;
use App\Http\Resources\HubsResource;
use App\Models\Hub;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HubController extends Controller
{
    /**
     * @var string
     */
    private string $content = 'hub_show';

    public function postsApiRoute(int $id)
    {
        switch (request()->path()) {
            case 'hubs/' . $id:
                return '/api/hubs/' . $id . '/top/day';
            case 'hubs/' . $id . '/top/week':
                return '/api/hubs/' . $id . '/top/week';
            case 'hubs/' . $id . '/top/month':
                return '/api/hubs/' . $id . '/top/month';
            case 'hubs/' . $id . '/all':
                return '/api/hubs/' . $id . '/all';
            default:
                return response()->json(['message' => 'not found'], 404);
        }
    }

    /**
     * @param Request $request
     * @param string  $slug
     * @return Application|Factory|View
     */
    public function show(Request $request, string $slug)
    {
        $hub = new HubResource(Hub::withCount('favorites', 'articles')->where('slug', $slug)->firstOrFail());

        return view(
            'pages.hubs.show',
            [
                'hub'            => $hub,
                'articles_count' => $hub->articles_count,
                'url'            => $this->postsApiRoute($hub->id),
                'content'        => $this->content,
            ]
        );
    }

    public function index()
    {
        $top_hubs          = new HubsResource(Hub::orderBy('rating', 'DESC')->take(5)->get());
        $top_followed_hubs = new HubsResource(
            Hub::withCount('favorites')->orderBy(
                'favorites_count',
                'desc'
            )->take(5)->get()
        );

        return view(
            'pages.hubs.hubs',
            [
                'top_hubs'          => $top_hubs,
                'top_followed_hubs' => $top_followed_hubs,
            ]
        );
    }
}
