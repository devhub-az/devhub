<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Parsedown;
use App\Http\Resources\PostCollection;
use App\Http\Resources\HubsCollection;
use App\Models\PostFavorite;
use App\Models\Hub;
use App\Models\Post;
use App\Models\PostVote;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'favorite', 'store', 'edit', 'updateVote', 'addFavorite']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $hubs = new HubsCollection(Hub::get());
        return view('pages.posts.create', [
            'hubs' => $hubs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        dd($request->get('body'));
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            // 'tags' => 'required',
        ]);

        $share = new Post([
            'name' => $request->get('title'),
            'body' => $request->get('body'),
            'author_id' => Auth::user()->id,
        ]);

        $share->save();
        return redirect('/post/' . $request->get('id'))->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param \Request $request
     * @param int $id
     * @return Response
     */
    public function show(\Request $request, $id)
    {
        $parsedown = new Parsedown();
        $post = new PostCollection(Post::with('hubs')->with('comments')->findOrFail($id));

//        PostView::createViewLog($post);

        return view('pages.posts.show', [
            'post' => $post,
            'body' => \Purifier::clean($parsedown->text($post->body)),
            'hubs' => $post->hubs,
            'comments' => $post->comments
        ]);
    }

    /**
     * @param \Request $request
     * @return vote status
     */
    public function updateVote(\Request $request)
    {
        $request->validate([
            'id' => 'required|int',
            'vote' => 'required|int',
        ]);
        $share = Post::findOrFail($request->get('id'));
        if (isset($share) && $request->get('status') == 'upvote') {
            if (PostVote::where('post_id', $request->get('id'))->count() > 0) {
                $vote = PostVote::where('post_id', $request->get('id'))->firstOrFail();
                $vote->status = '1';
                $vote->save();
            } else {
                $vote = new PostVote([
                    'post_id' => $request->get('id'),
                    'user_id' => Auth::user()->id,
                    'status' => '1',
                ]);
                $vote->save();
            }
            $share->votes = $request->get('vote');
            foreach ($share->tags as $hub) {
                $hub->raiting = $hub->raiting + $request->get('change_raiting');
                $hub->save();
            }
            $share->creator->raiting = $share->creator->raiting + $request->get('change_raiting');
            $share->creator->save();
            $share->save();
            return response()->json(['success' => 'success', 'status' => $request->get('status')], 200);
        } else if (isset($share) && $request->get('status') == 'downvote') {
            if (PostVote::where('post_id', $request->get('id'))->count() > 0) {
                $vote = PostVote::where('post_id', $request->get('id'))->firstOrFail();
                $vote->status = '0';
                $vote->save();
            } else {
                $vote = new PostVote([
                    'post_id' => $request->get('id'),
                    'user_id' => Auth::user()->id,
                    'status' => '0',
                ]);
                $vote->save();
            }
            $share->votes = $request->get('vote');
            foreach ($share->tags as $hub) {
                $hub->raiting = $hub->raiting + $request->get('change_raiting');
                $hub->save();
            }
            $share->creator->raiting = $share->creator->raiting + $request->get('change_raiting');
            $share->creator->save();
            $share->save();
            return response()->json(['success' => 'success', 'status' => $request->get('status')], 200);
        } else if ($request->get('status') != 'upvote' && $request->get('status') != 'downvote') {
            PostVote::where([
                'post_id' => $request->get('id'),
                'user_id' => Auth::user()->id,
            ])->delete();
            $share->votes = $request->get('vote');
            foreach ($share->tags as $hub) {
                $hub->raiting = $hub->raiting + $request->get('change_raiting');
                $hub->save();
            }
            $share->creator->raiting = $share->creator->raiting + $request->get('change_raiting');
            $share->creator->save();
            $share->save();
            return response()->json(['delete' => 'delete'], 200);
        } else {
            return response()->json(['error' => 'error', 'status' => $request->get('status')], 500);
        }
    }

    /**
     * @param \Request $request
     * @return JsonResponse
     */
    public function addFavorite(\Request $request)
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $share = Post::findOrFail($request->get('id'));
        if (isset($share) && !$share->postIsFollowing(Auth::user())) {
            $favorite = new PostFavorite([
                'post_id' => $request->get('id'),
                'follower_id' => Auth::user()->id,
            ]);
            $favorite->save();
            return response()->json(['success' => 'success'], 200);
        } else if ($share->postIsFollowing(Auth::user())) {
            PostFavorite::where([
                'post_id' => $request->get('id'),
                'follower_id' => Auth::user()->id,
            ])->delete();
            return response()->json(['delete' => 'delete'], 200);
        } else {
            return response()->json(['error' => 'error'], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Request $request
     * @param int $id
     * @return void
     */
    public function update(\Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
