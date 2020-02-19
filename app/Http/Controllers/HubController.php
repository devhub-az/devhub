<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubCollection;
use App\Http\Resources\HubsCollection;
use App\Models\Favorite;
use App\Models\Hub;
use App\Models\HubFollows;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HubController extends Controller
{
    /**
     * @var string
     */
    private $content = 'hub_show';

    public function postsApiRoute(int $id)
    {
        switch (\request()->path()) {
            case 'hubs/' . $id:
                return '/api/hubs/' . $id . '/top/day';
            case 'hubs/' . $id . '/top/week':
                return '/api/hubs/' . $id . '/top/week';
            case 'hubs/' . $id . '/top/month':
                return '/api/hubs/' . $id . '/top/month';
            case 'hubs/' . $id . '/all':
                return '/api/hubs/' . $id . '/all';
            default:
                return abort(404);
        }
    }

    /**
     * @param int $id
     * @return Factory|View
     */
    public function show(int $id): View
    {
        $hub = new HubCollection(Hub::withCount('hubFollowers')->findOrFail($id));
        return view('pages.hubs.show', [
            'hub' => $hub,
            'posts_count' => $hub->posts()->count(),
            'url' => $this->postsApiRoute($id),
            'content' => $this->content,
        ]);
    }

    /**
     * @return Factory|View
     */
    public function index(): View
    {
        $top_hubs = new HubsCollection(Hub::orderBy('rating', 'DESC')->take(5)->get());
        $top_followed_hubs = new HubsCollection(Hub::withCount('hubFollowers')->orderBy('hub_followers_count',
            'desc')->take(5)->get());
        return view('pages.hubs.hubs', [
            'top_hubs' => $top_hubs,
            'top_followed_hubs' => $top_followed_hubs,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function follow(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $hub = Hub::findOrFail($request->get('id'));
        if (isset($hub) && !$hub->hubIsFollowing(\Auth::user())) {
            $hub->favorites()->create([
                'following_id' => $request->get('id'),
                'follower_id' => \Auth::user()->id,
            ]);

            return response()->json(['success' => 'success'], 200);
        }
        if ($hub->hubIsFollowing(\Auth::user())) {
            $hub->favorites()->where([
                'follower_id' => \Auth::user()->id,
                'following_id' => $request->get('id'),
            ])->delete();

            return response()->json(['delete' => 'delete'], 200);
        }

        return response()->json(['error' => 'error'], 401);
    }
}
