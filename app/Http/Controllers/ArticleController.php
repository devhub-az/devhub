<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Requests\IdRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\HubResource;
use App\Jobs\DeleteArticle;
use App\Models\Article;
use App\Models\Hub;
use App\Policies\ArticlePolicy;
use App\Services\Canvas;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            [Authenticate::class, EnsureEmailIsVerified::class],
            ['only' => ['create', 'favorite', 'store', 'edit', 'vote', 'addFavorite']]
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $hubs = new HubResource(Hub::get());

        return view(
            'pages.articles.create',
            [
                'hubs' => $hubs,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @param Request $request
     * @return View
     */
    public function show(Article $article, Request $request): view
    {
        (new Canvas())->viewer($article);

        ArticleResource::withoutWrapping();
        $article_json = new ArticleResource($article);

        return view('pages.articles.show', ['article' => $article_json->toResponse($request)->getData()]);
    }

    /**
     * @param IdRequest $request
     *
     * @return JsonResponse
     */
    public function favorite(IdRequest $request): JsonResponse
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
     * @param Article $article
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Article $article)
    {
        $this->authorize(ArticlePolicy::UPDATE, $article);

        return view(
            'articles.edit',
            [
                'article'      => $article,
                'hubs'         => Hub::all(),
                'selectedTags' => old('hubs', $article->hubs()->pluck('id')->toArray()),
            ]
        );
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
     * @param Article $article
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Article $article): RedirectResponse
    {
        $this->authorize(ArticlePolicy::DELETE, $article);

        $this->dispatchNow(new DeleteArticle($article));

        return redirect()->route('home');
    }
}
