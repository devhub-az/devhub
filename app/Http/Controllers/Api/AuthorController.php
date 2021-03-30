<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\ArticlesResource;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorsResource;
use App\Jobs\FollowAuthor;
use App\Models\Article;
use App\Models\User;
use App\Policies\AuthorPolicy;
use App\Services\LogoUploadService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorController extends Controller
{
    public function index(FilterRequest $request): AnonymousResourceCollection
    {
        return AuthorResource::collection(
            User::withCount(['articles', 'followers', 'followings'])
                ->with('followers', 'followings')
                ->orderBy(
                    $request->column ?? 'created_at',
                    $request->order ?? 'DESC'
                )->paginate($request->perPage ?? '10')
        );
    }

    /**
     * @param string $id
     * @return AuthorResource
     */
    public function show(string $id): AuthorResource
    {
        AuthorResource::withoutWrapping();

        return new AuthorResource(User::withCount(['articles', 'followers', 'followings'])->findOrFail($id));
    }

    /**
     * @param int $id
     *
     * @return AuthorResource
     */
    public function userFollowCheck(int $id): AuthorResource
    {
        return new AuthorResource(User::findorfail($id));
    }

    /**
     * @param int $id
     *
     * @return ArticlesResource
     */
    public function articles(int $id): ArticlesResource
    {
        return new ArticlesResource(
            Article::where('author_id', $id)
                ->orderByRaw('(upvoters_count - downvoters_count) DESC')
                ->orderBy('created_at', 'DESC')
                ->with('creator:id,username,avatar')
                ->withCount(['upvoters', 'downvoters', 'voters', 'views', 'bookmarkers', 'comments'])
                ->take(50)
                ->paginate(5)
        );
    }

    /**
     * @param User $author
     * @return mixed
     * @throws AuthorizationException
     */
    public function follow(User $author): mixed
    {
        $this->authorize(AuthorPolicy::FOLLOW, $author);

        return $this->dispatchNow(new FollowAuthor($author));
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        $status = LogoUploadService::Upload($request, \Auth::id());
        if ($status === true) {
            return response()->json(['success' => 'success'], 200);
        }

        return response()->json(['success' => 'success'], 500);
    }

    /**
     * @return AuthorsResource
     */
    public function search_user_by_key(): AuthorsResource
    {
        $key = \Request::get('q');

        if ($key) {
            return new AuthorsResource(
                User::whereraw('MATCH(name, username) AGAINST (?)', $key)
                    ->withCount('articles')->paginate()
            );
        }

        return new AuthorsResource(User::withCount('articles')->paginate());
    }
}
