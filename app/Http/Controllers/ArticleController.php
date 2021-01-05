<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\HubResource;
use App\Models\Article;
use App\Models\Hub;
use App\Models\User;
use App\Notifications\PostNotify;
use App\Services\Canvas;
use DB;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use Throwable;

class ArticleController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'favorite', 'store', 'edit', 'vote', 'addFavorite']]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $hubs = new HubResource(Hub::get());

        return view(
            'pages.posts.create',
            [
                'hubs' => $hubs,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate(
            [
                'title' => 'required|string',
                'body'  => 'string',
                // 'tags' => 'required',
            ]
        );

        DB::transaction(
            function () use ($request) {
                $share = new Article(
                    [
                        'name'      => $request->get('title'),
                        'body'      => $request->get('body'),
                        'author_id' => Auth::user()->id,
                    ]
                );
                $share->save();

                Notification::send(Auth::user()->followers, new PostNotify($share));

                return redirect('/post/'.$share->id);
            }
        );

        return response()->json(
            [
                'message' => 'New post created',
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string  $slug
     * @return View
     */
    public function show(Request $request, string $slug): view
    {
        $article = Article::with(
            [
                'creator' => function ($query) {
                    $query->select('id', 'username', 'avatar', 'description', 'karma', 'rating')->withCount(
                        'articles',
                        'followers'
                    );
                },
            ]
        )->where('slug', $slug)->firstOrFail();

        (new Canvas())->viewer($article);

        ArticleResource::withoutWrapping();
        $article_json = new ArticleResource($article);

        return view('pages.posts.show', ['post' => $article_json->toResponse($request)->getData()]);
    }

    /**
     * @param Request $request
     * @param         $type
     *
     * @return mixed
     * @throws ValidationException
     */
    public function postVoteComment(Request $request, $type): mixed
    {
        $this->validate(
            $request,
            [
                'id' => 'required|exists:comments,id',
            ]
        );

        $user = $request->user();

        $post = Article::findOrFail($request->id);

        ($type === 'upvote') ? User::upOrDownVote($user, $post) : User::upOrDownVote($user, $post, 'downvote');

        return $this->response->withNoContent();
    }

    /**
     * @param $post
     * @param $request
     *
     * @return JsonResponse
     * @throws Exception|Throwable
     */
    public function postRatingChanger($post, $request): JsonResponse
    {
        $user = $request->user();
        $voteStatus = $request->get('status');

        try {
            DB::beginTransaction();
            if (isset($voteStatus)) {
                switch ($voteStatus) {
                    case 'upvote':
                        $user->upvote($post);
                        break;
                    case 'downvote':
                        $user->downvote($post);
                        break;
                    case 'delete':
                        $user->cancelVote($post);
                        break;
                }
                $post->creator->save();
            }
            foreach ($post->hubs as $hub) {
                $hub->rating += $request->get('change_rating');
                $hub->save();
            }
            $post->creator->rating += $request->get('change_rating');
            DB::commit();
        } catch (\Exception $e) {
            //failed logic here
            DB::rollback();

            return response()->json(['error' => 'error'], 500);
        }

        return response()->json(
            [
                'success' => 'success',
            ]
        );

//        return response()->json([
//            'transaction'        => $voteStatus,
//            'isset($voteStatus)' => isset($voteStatus),
//            'count'              => $post->voters->count(),
//            'success'            => 'success',
//            'status'             => $request->get('status'),
//            'post_id'            => $request->get('id'),
//            'user_id'            => $user->id
//        ], 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse status
     * @throws Exception|Throwable
     */
    public function vote(Request $request): JsonResponse
    {
        $request->validate(
            [
                'id'   => 'required|int',
                'vote' => 'required|int',
            ]
        );

        $post = Article::findOrFail($request->get('id'));

        return $this->postRatingChanger($post, $request);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function addFavorite(Request $request): JsonResponse
    {
        $request->validate(
            [
                'id' => 'required|int',
            ]
        );
        $share = Article::findOrFail($request->get('id'));
        if (\Auth::user()) {
            $user = \Auth::user();
            if (isset($share) && ! $user->hasBookmarked($share)) {
                $user->bookmark($share);

                return response()->json(['success' => 'success'], 200);
            }

            if ($user->hasBookmarked($share)) {
                $user->unbookmark($share);

                return response()->json(['delete' => 'delete'], 200);
            }
        }

        if (isset($share) && ! $share->postIsFollowing(Auth::user())) {
            $share->favorites()->create(
                [
                    'follower_id'  => Auth::user()->id,
                    'following_id' => $request->get('id'),
                ]
            );

            return response()->json(['success' => 'success'], 200);
        }

        if ($share->postIsFollowing(Auth::user())) {
            $share->favorites()->where(
                [
                    'follower_id'  => Auth::user()->id,
                    'following_id' => $request->get('id'),
                ]
            )->delete();

            return response()->json(['delete' => 'delete'], 200);
        }

        return response()->json(['error' => 'error'], 401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return void
     */
    public function edit(): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @return void
     */
    public function update(): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return void
     */
    public function destroy(): void
    {
        //
    }
}
