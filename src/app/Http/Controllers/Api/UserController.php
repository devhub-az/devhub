<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\UserCollection;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function users(): AnonymousResourceCollection
    {
        return UserCollection::collection(User::paginate(5));
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
}
