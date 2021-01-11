<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Http\Resources\ArticlesResource;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\AuthorsResource;
use App\Models\Article;
use App\Models\User;
use App\Services\LogoUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuthorController extends Controller
{
    public function index(FilterRequest $request): AnonymousResourceCollection
    {
        return AuthorResource::collection(
            User::select(
                [
                    'id',
                    'name',
                    'username',
                    'avatar',
                    'description',
                    'karma',
                    'rating',
                ]
            )->with('followers', 'followings')->withCount('articles', 'followers', 'followings')->orderBy(
                $request->get('column'),
                $request->get('order')
            )->paginate(12)
        );
    }

    public function show($id)
    {
        AuthorResource::withoutWrapping();

        return new AuthorResource(User::withCount(['articles', 'followers', 'followings'])->findOrFail($id));
    }

    /**
     * @param int $id
     *
     * @return AuthorResource
     */
    public function userFollowCheck(int $id)
    {
        return new AuthorResource(User::findorfail($id));
    }

    /**
     * @param int $id
     *
     * @return ArticlesResource
     */
    public function posts(int $id): ArticlesResource
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
     * @param int $id
     *
     * @return AuthorsResource
     */
    public function followings(int $id)
    {
//        $user = User::findorfail($id);
//        $followings = $user->followings()->select('name', 'avatar', 'rating', 'karma')->with('posts')->get();

        return new AuthorsResource(
            User::with('articles')->findorfail($id)->followings
        );
    }

    /**
     * @param int $id
     *
     * @return UsersCollection
     */
    public function followers(int $id)
    {
        $user = User::findorfail($id);
        $followers = $user->followers()->select('name', 'avatar', 'rating', 'karma')->with('posts')->get();

        return new UsersCollection($followers);
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
