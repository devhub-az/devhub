<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\HubCollection;
use App\Http\Resources\HubsCollection;
use App\Http\Resources\PostsCollection;
use Illuminate\Support\Facades\Auth;
use App\Models\Hubs;
use App\Models\Post;
use App\Models\HubFollows;

class HubsController extends Controller
{
    public function index(){
        $top_hubs = new HubsCollection(Hubs::orderBy('raiting','DESC')->paginate(5));
        $top_followed_hubs = new  HubsCollection(Hubs::withCount('hubFollowers')->orderBy('hub_followers_count', 'desc')->paginate(5));
        // dd($top_followed_hubs);
    	return view('pages.hubs.hubs', [
            'top_hubs' => $top_hubs,
            'top_followed_hubs' => $top_followed_hubs
        ]);
    }

    /**
     * [show description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function show(Request $request, $id)
    {
    	$hub = new HubCollection(Hubs::withCount('hubFollowers')->findOrFail($id));

    	return view('pages.hubs.show', [
    	    'hub' => $hub,
            'posts_count' => count($hub->posts()->get()),
    	    'url' => '/api/hubs/' . $id
    	]);
    }

    /**
     * API
     */
    public function hubPosts(Request $request, $id)
    {
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
        	->whereHas('tags', function ($query) use($id) {
    			$query->where('hubs.id', '=', $id);
			})
            ->with('creator:id,username')
            ->with('tags:name')
            ->with('comments:body')
            ->paginate(5));
    }

    public function hubs(){
    	return new HubsCollection(Hubs::orderBy('raiting','DESC')->paginate(10));
    }

    public function follow(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $share = Hubs::findOrFail($request->get('id'));
        if (isset($share) && !$share->hubIsFollowing(Auth::user())) {
            $favorite = new HubFollows([
                'hub_id' => $request->get('id'),
                'follower_id' => Auth::user()->id,
            ]);
            $favorite->save();
            return response()->json(['success' => 'success'], 200);
        } else if($share->hubIsFollowing(Auth::user())) {
            HubFollows::where([
                'hub_id' => $request->get('id'),
                'follower_id' => Auth::user()->id,
            ])->delete();
            return response()->json(['delete' => 'delete'], 200);
        } else {
            return response()->json(['error' => 'error'], 401);
        }
    }
}
