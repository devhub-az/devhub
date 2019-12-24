<?php

namespace App\Http\Controllers;

use App\Http\Resources\HubsCollection;
use App\Http\Resources\PostCollection;
use App\Models\Hub;
use App\Models\Post;
use App\Models\PostFavorite;
use App\Models\PostVote;
use App\Notifications\PostNotify;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Parsedown;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'favorite', 'store', 'edit', 'vote', 'addFavorite']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $hubs = new HubsCollection(Hub::get());

        return view('pages.posts.create', [
            'hubs' => $hubs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): RedirectResponse
    {
//        dd($request->all());
        $request->validate([
            'title' => 'required|string',
            'body'  => 'string',
            // 'tags' => 'required',
        ]);

        $share = new Post([
            'name'      => $request->get('title'),
            'body'      => $request->get('body'),
            'author_id' => Auth::user()->id,
        ]);

        $share->save();
        Notification::send(Auth::user()->followers, new PostNotify($share));

        return redirect('/post/' . $share->id);
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
            'post'     => $post,
//            'body'     => $post->body,
            'body'     => \Purifier::clean($parsedown->text($post->body)),
            'hubs'     => $post->hubs,
            'comments' => $post->comments,
        ]);
    }

    /**
     * @param $post
     * @param $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function postRatingChanger($post, $request): JsonResponse
    {
        $voteStatus = $request->get('status');
        $vote = PostVote::where('post_id', $request->get('id'));
        $postVoteCount = $vote->count();
        $transaction = false;

        if ($postVoteCount === 1 && isset($voteStatus)) {
            $vote = $vote->firstOrFail();
            switch ($voteStatus) {
                case 'upvote':
                    $vote->status = '1';
                    break;
                case 'downvote':
                    $vote->status = '0';
                    break;
            }
            $transaction = true;
        } elseif ($postVoteCount === 0 && isset($voteStatus)) {
            switch ($voteStatus) {
                case 'upvote':
                    $voteValue = '1';
                    break;
                case 'downvote':
                    $voteValue = '0';
                    break;
            }
            $vote = new PostVote([
                'post_id' => $request->get('id'),
                'user_id' => Auth::user()->id,
                'status'  => $voteValue,
            ]);
            $transaction = true;
        } elseif (!isset($voteStatus)) {
            $vote = PostVote::where([
                'post_id' => $request->get('id'),
                'user_id' => Auth::user()->id,
            ]);
            $transaction = 'delete';
        }
        $post->votes = $request->get('vote');
        foreach ($post->hubs as $hub) {
            $hub->rating += $request->get('change_rating');
            $hub->save();
        }
        $post->creator->rating += $request->get('change_rating');
        if ($transaction === true) {
            $vote->save();
            $post->creator->save();
            $post->save();
        } elseif ($transaction === 'delete') {
            $vote->delete();
            $post->creator->save();
            $post->save();
        }

        return response()->json(['success' => 'success', 'status' => $request->get('status')], 200);
    }

    /**
     * @param Request $request
     * @return JsonResponse status
     * @throws \Exception
     */
    public function vote(Request $request): JsonResponse
    {
        $request->validate([
            'id'   => 'required|int',
            'vote' => 'required|int',
        ]);

        $post = Post::findOrFail($request->get('id'));

        return self::postRatingChanger($post, $request);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addFavorite(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $share = Post::findOrFail($request->get('id'));
        if (isset($share) && !$share->postIsFollowing(Auth::user())) {
            $favorite = new PostFavorite([
                'post_id'     => $request->get('id'),
                'follower_id' => Auth::user()->id,
            ]);
            $favorite->save();

            return response()->json(['success' => 'success'], 200);
        }
        if ($share->postIsFollowing(Auth::user())) {
            PostFavorite::where([
                'post_id'     => $request->get('id'),
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
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
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
