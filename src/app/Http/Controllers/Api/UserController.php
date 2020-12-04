<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersCollection;
use App\Models\Article;
use App\Models\User;
use App\Services\LogoUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function users(): AnonymousResourceCollection
    {
        return UserResource::collection(User::select(['id', 'name', 'username', 'avatar', 'about', 'karma',
            'rating'])->withCount('posts', 'followers')->paginate(12));
    }

    /**
     * @param int $id
     * @return UserResource
     */
    public function userFollowCheck(int $id)
    {
        return new UserResource(User::findorfail($id));
    }

    /**
     * @param int $id
     * @return PostsCollection
     */
    public function posts(int $id): PostsCollection
    {
        return new PostsCollection(
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
     * @return UsersCollection
     */
    public function followings(int $id)
    {
        $user = User::findorfail($id);
        $followings = $user->followings()->select('name', 'avatar', 'rating', 'karma')->with('posts')->get();

        return new UsersCollection($followings);
    }

    /**
     * @param int $id
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
}
