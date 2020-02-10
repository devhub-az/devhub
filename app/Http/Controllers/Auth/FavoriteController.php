<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexPosts(): View
    {
        return view('auth.favorite.posts',['url' => '/api/saved/posts']);
    }

    public function indexComments(): View
    {
        return view('auth.favorite.comments' );
    }
}
