<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentUpload;
use App\Models\Comment;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['newComment']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentUpload $request
     * @return RedirectResponse
     */
    public function newComment(CommentUpload $request)
    {
        $comment = new Comment();
        $comment->author_id = Auth::User()->id;
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->save();

        return \Redirect::to(\URL::previous() . "#post_" . $comment->id);
    }

    public function favorite(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
        ]);
        $comment = Comment::findOrFail($request->get('id'));
        if (isset($comment) && !$comment->isFavorite(Auth::user())) {
            $comment->favorites()->create([
                'follower_id'    => Auth::user()->id,
                'following_id' => $request->get('id'),
            ]);
            return response()->json(['success' => 'success'], 200);
        }
        if ($comment->isFavorite(Auth::user())) {
            $comment->favorites()->where([
                'follower_id'    => Auth::user()->id,
                'following_id' => $request->get('id'),
            ])->delete();

            return response()->json(['delete' => 'delete'], 200);
        }

        return response()->json(['error' => 'error'], 401);
    }
}
