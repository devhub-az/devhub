<?php

namespace App\Models;

class PostView extends \Eloquent
{
    protected $table = 'posts_views';

    public static function createViewLog($post)
    {
        $view = self::where('post_id', $post->id)->where('ip', \Request::getClientIp())->first();
        if (! $view) {
            $postsViews = new self();
            $postsViews->post_id = $post->id;
            $postsViews->title = $post->name;
            $postsViews->url = \Request::url();
            $postsViews->session_id = \Request::getSession()->getId();
            $postsViews->user_id = (\Auth::check()) ? \Auth::id() : null;
            $postsViews->ip = \Request::getClientIp();
            $postsViews->agent = \Request::header('User-Agent');
            $postsViews->save();
        }
    }
}
