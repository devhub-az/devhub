<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdRequest;
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
                    $query->select('id', 'username', 'avatar', 'description', 'karma', 'rating', 'github_url')
                        ->withCount(
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
     * @param IdRequest $request
     *
     * @return JsonResponse
     */
    public function addFavorite(IdRequest $request): JsonResponse
    {
        $article = Article::findOrFail($request->get('id'));
        $user = Auth::user();
        if (! $user->hasFavorited($article)) {
            $user->favorite($article);

            return response()->json(['success' => 'success'], 200);
        }
        $user->unfavorite($article);

        return response()->json(['delete' => 'delete'], 200);
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
