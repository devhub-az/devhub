<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UsersCollection;
use App\Models\Post;
use App\Models\User;
use App\Services\LogoUploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function users(): AnonymousResourceCollection
    {
        return UserCollection::collection(User::paginate(12));
    }

    public function userFollowCheck(int $id)
    {
        return new UserCollection(User::findorfail($id));
    }

    /**
     * @param int $id
     * @return PostsCollection
     */
    public function posts(int $id): PostsCollection
    {
        return new PostsCollection(
            Post::where('author_id', $id)
                ->orderByRaw('(upvoters_count - downvoters_count) DESC')
                ->orderBy('created_at', 'DESC')
                ->with('creator:id,username,avatar')
                ->withCount('upvoters', 'downvoters', 'voters', 'views', 'bookmarkers', 'comments')
                ->take(50)
                ->paginate(5)
        );
    }

    public function followings(int $id)
    {
        $user = User::findorfail($id);
        $followings = $user->followings()->addselect('name', 'avatar', 'rating', 'karma')->with('posts')->get();

        return new UsersCollection($followings);
    }

    public function followers(int $id)
    {
        $user = User::findorfail($id);
        $followers = $user->followers()->addselect('name', 'avatar', 'rating', 'karma')->with('posts')->get();

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
