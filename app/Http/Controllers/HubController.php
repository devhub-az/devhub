<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubCollection;
use App\Http\Resources\HubsCollection;
use App\Models\Hub;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            case 'hubs/'.$id:
                return '/api/hubs/'.$id.'/top/day';
            case 'hubs/'.$id.'/top/week':
                return '/api/hubs/'.$id.'/top/week';
            case 'hubs/'.$id.'/top/month':
                return '/api/hubs/'.$id.'/top/month';
            case 'hubs/'.$id.'/all':
                return '/api/hubs/'.$id.'/all';
            default:
                return abort(404);
        }
    }

    /**
     * @param int $id
     *
     * @return Factory|View
     */
    public function show(int $id): View
    {
        $hub = new HubCollection(Hub::withCount('followers')->findOrFail($id));

        return view(
            'pages.hubs.show',
            [
                'hub'         => $hub,
                'posts_count' => $hub->posts->count(),
                'url'         => $this->postsApiRoute($id),
                'content'     => $this->content,
            ]
        );
    }

    /**
     * @return Factory|View
     */
    public function index(): View
    {
        $top_hubs = new HubsCollection(Hub::orderBy('rating', 'DESC')->take(5)->get());
        $top_followed_hubs = new HubsCollection(
            Hub::withCount('followers')->orderBy(
                'followers_count',
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

    /**
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function follow(Request $request): JsonResponse
    {
        $userId = Auth::user();
        $hub = Hub::findOrFail($request->get('id'));
        if (isset($hub) && ! $hub->isFollowedBy($userId)) {
            $userId->follow($hub);

            return response()->json(['success' => 'success'], 200);
        }
        if ($hub->isFollowedBy($userId)) {
            $userId->unfollow($hub);

            return response()->json(['delete' => 'delete'], 200);
        }

        return response()->json(['error' => 'error'], 401);
    }
}
