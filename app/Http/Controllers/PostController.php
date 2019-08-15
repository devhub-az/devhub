<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\PostsVotes;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostsCollection;
use App\Models\PostFavorites;
use App\Models\PostsViews;
use DB;

class PostController extends Controller
{

	public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'favorite', 'store', 'edit', 'updateVote', 'addFavorite'] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDay()
    {
        return new PostsCollection(Post::where(DB::raw('DATE(created_at)'), '=', DB::raw('DATE_SUB(CURDATE(), INTERVAL 0 DAY)'))->orderBy('votes', 'DESC')->orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments')
            ->paginate(5));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWeek()
    {
        return new PostsCollection(Post::where(DB::raw('DATE(created_at)'), '>', DB::raw('DATE_SUB(CURDATE(), INTERVAL 7 DAY)'))->orderBy('votes', 'DESC')->orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
            ->paginate(5));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMonth()
    {
        return new PostsCollection(Post::where(DB::raw('DATE(created_at)'), '>', DB::raw('DATE_SUB(CURDATE(), INTERVAL 30 DAY)'))->orderBy('votes', 'DESC')->orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
            ->paginate(5));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
            ->paginate(5));
    }

    /**
     * @return api
     */
    public function favorite()
    {
        // dd(Auth::user()->getHubsIdsAttribute());
        return new PostsCollection(Post::orderBy('created_at', 'DESC')
            ->whereIn('author_id', Auth::user()->getUserIdsAttribute())
            ->orWhereHas('tags', function($q) {
                   $q->whereIn('hubs.id', Auth::user()->getHubsIdsAttribute()); 
                })
            ->with('creator:id,username')
            ->with('comments:body')
            ->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|string',
           'body' => 'required|string|min:110',
           // 'tags' => 'required',
        ]);

        $share = new Post([
          'name' => $request->get('title'),
          'body'=> $request->get('body'),
          'author_id'=> Auth::user()->id, 
        ]);

        $share->save();
        return redirect('/')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $post = new PostCollection(Post::findOrFail($id));
        PostsViews::createViewLog($post);

        return view('pages.posts.show', [
            'post' => $post,
            'hubs' => $post->tags()->withCount(['hubFollowers', 'posts'])->get(),
            'comments' => $post->comments()->with('author')->get()
        ]);
    }

    /**
     * @param  Request
     * @return vote status
     */
    public function updateVote(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
            'vote' => 'required|int',
        ]);
        $share = Post::findOrFail($request->get('id'));
        if (isset($share) && $request->get('status') == 'upvote'){
            if (PostsVotes::where('post_id', $request->get('id'))->count() > 0) {
                $vote = PostsVotes::where('post_id', $request->get('id'))->firstOrFail();
                $vote->status = '1';
                $vote->save();
            } else {
                $vote = new PostsVotes([
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
            if (PostsVotes::where('post_id', $request->get('id'))->count() > 0) {
                $vote = PostsVotes::where('post_id', $request->get('id'))->firstOrFail();
                $vote->status = '0';
                $vote->save();
            } else {
                $vote = new PostsVotes([
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
        } else if($request->get('status') != 'upvote' && $request->get('status') != 'downvote'){
            PostsVotes::where([
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
     * @param Request
     */
    public function addFavorite(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $share = Post::findOrFail($request->get('id'));
        if (isset($share) && !$share->postIsFollowing(Auth::user())) {
            $favorite = new PostFavorites([
                'post_id' => $request->get('id'),
                'follower_id' => Auth::user()->id,
            ]);
            $favorite->save();
            return response()->json(['success' => 'success'], 200);
        } else if($share->postIsFollowing(Auth::user())) {
            PostFavorites::where([
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
