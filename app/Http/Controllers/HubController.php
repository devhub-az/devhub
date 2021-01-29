<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubResource;
use App\Http\Resources\HubsResource;
use App\Models\Hub;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Numeric;

class HubController extends Controller
{
    public function articlesApiRoute(HubResource $hub)
    {
        switch (request()->path()) {
            case 'hubs/'.$hub->slug:
                return '/api/hubs/'.$hub->id.'/top/day';
            case 'hubs/'.$hub->slug.'/top/week':
                return '/api/hubs/'.$hub->id.'/top/week';
            case 'hubs/'.$hub->slug.'/top/month':
                return '/api/hubs/'.$hub->id.'/top/month';
            case 'hubs/'.$hub->slug.'/all':
                return '/api/hubs/'.$hub->id.'/all';
            default:
                return response()->json([], 404);
        }
    }

    /**
     * @param Request $request
     * @param string  $slug
     * @return Application|Factory|View
     */
    public function show(Request $request, string $slug)
    {
        HubResource::withoutWrapping();
        $hub = new HubResource(Hub::withCount('favorites', 'articles')->where('slug', $slug)->firstOrFail());

        return view(
            'pages.hubs.show',
            [
                'hub'                 => $hub->toResponse($request)->getData(),
                'url'                 => $this->articlesApiRoute($hub),
            ]
        );
    }

    public function index()
    {
        $top_hubs = new HubsResource(Hub::orderBy('rating', 'DESC')->take(5)->get());
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
