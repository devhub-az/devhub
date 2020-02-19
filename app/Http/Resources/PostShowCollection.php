<?php

namespace App\Http\Resources;

use App\Models\Hub;
use Illuminate\Http\Resources\Json\Resource;
use Mews\Purifier\Purifier;
use Parsedown;
use Illuminate\Support\Facades\Auth;

class PostShowCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array
     */
    public function toArray($request)
    {
        $parsedown = new Parsedown();

        return [
            'id'            => $this->id,
            'title'         => $this->name,
            'body'          => \Purifier::clean($parsedown->text($this->body)),
            'creator'       => $this->creator->username,
            'profile_image' => '', // $this->getFirstMediaUrl('avatars'),
            'votes'         => $this->rating(),
            'votes_sum'     => $this->votes()->count(),
            'upvotes'       => $this->upvotes(),
            'downvotes'     => $this->downvotes(),
            'tags'          => new HubsCollection(Hub::whereIn('id',
                $this->getHubsIdsAttribute())->withCount(['hubFollowers', 'posts'])->get()),
            'comments'      => $this->comments->count(), //Comment::where('post_id', $this->id)->count(),
            'views'         => $this->views->count(),
            'created_at'    => $this->created_at,
            'read_time'     => $this->readTime($this->body),
            'upvoted'       => $this->statusCheck('upvote'),
            'downvoted'     => $this->statusCheck('downvote'),
            'favorite'      => $this->statusCheck('favorites'),
            'favorites'     => $this->favorites->count(),
        ];
    }

    public function statusCheck($status)
    {
        if (Auth::check()) {
            switch ($status) {
                case 'upvote':
                    return $this->postIsVoted(Auth::user()) === 'upvoted';
                case 'downvote':
                    return $this->postIsVoted(Auth::user()) === 'downvoted';
                case 'favorites':
                    return $this->postIsFollowing(Auth::user()) === 1;
            }
        }
        return null;
    }

    /**
     * @param $text
     * @return string
     */
    public function readTime(string $text): string
    {
        $word = str_word_count(strip_tags($text));
        $minutes = floor($word / 200);

        return $minutes . ' dəqiqə';
    }
}
