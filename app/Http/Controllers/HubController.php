<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\HubCollection;
use App\Http\Resources\HubsCollection;
use App\Models\Hub;
use App\Models\HubFollows;
use Illuminate\View\View;

class HubController extends Controller
{
    /**
     * @var string
     */
    private $content = 'hub_show';

    /**
     * @param int $id
     * @return Factory|View
     */
    public function show(int $id)
    {
        $hub = new HubCollection(Hub::withCount('hubFollowers')->findOrFail($id));
        return view('pages.hubs.show', [
            'hub'         => $hub,
            'posts_count' => count($hub->posts()->get()),
            'url'         => '/api/hubs/' . $id,
            'content'     => $this->content
        ]);
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $top_hubs = new HubsCollection(Hub::orderBy('rating', 'DESC')->paginate(5));
        $top_followed_hubs = new HubsCollection(Hub::withCount('hubFollowers')->orderBy('hub_followers_count',
            'desc')->paginate(5));
        return view('pages.hubs.hubs', [
            'top_hubs'          => $top_hubs,
            'top_followed_hubs' => $top_followed_hubs
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function follow(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $share = Hub::findOrFail($request->get('id'));
        if (isset($share) && !$share->hubIsFollowing(\Auth::user())) {
            $favorite = new HubFollows([
                'hub_id'      => $request->get('id'),
                'follower_id' => \Auth::user()->id,
            ]);
            $favorite->save();
            return response()->json(['success' => 'success'], 200);
        } else {
            if ($share->hubIsFollowing(\Auth::user())) {
                HubFollows::where([
                    'hub_id'      => $request->get('id'),
                    'follower_id' => \Auth::user()->id,
                ])->delete();
                return response()->json(['delete' => 'delete'], 200);
            } else {
                return response()->json(['error' => 'error'], 401);
            }
        }
    }
}
