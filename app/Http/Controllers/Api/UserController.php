<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsCollection;
use App\Http\Resources\UserCollection;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        return UserCollection::collection(User::paginate(5));
    }

    /**
     * @param int $id
     * @return PostsCollection
     */
    public function posts(int $id): PostsCollection
    {
        return new PostsCollection(Post::where('author_id', $id)
            ->orderBy('created_at', 'DESC')
            ->with('creator:id,username')
            ->with('comments:body')
            ->take(50)
            ->paginate(5));
    }
}
