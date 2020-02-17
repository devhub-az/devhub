<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Comment;
use App\Models\Hub;
use Auth;
use Parsedown;
use Purifier;

class PostCollection extends JsonResource
{

    /**
     * TODO profile image add
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        $parsedown = new Parsedown();

        return [
            'data' => [
                'id'            => $this->id,
                'title'         => $this->name,
                'body_short'    => $this->shorten(Purifier::clean($parsedown->text($this->body)), 80),
                'body'          => \Purifier::clean($parsedown->text($this->body)),
                'creator'       => $this->creator->username,
                'profile_image' => '', // $this->getFirstMediaUrl('avatars'),
                'votes'         => $this->votes,
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
                'favorite'      => $this->statusCheck('following'),
                'followers'     => count($this->postFollowers),
            ],
        ];
    }

    /**
     * @param string $text
     * @param int $maxLength
     * @return string
     */
    public function shorten(string $text, int $maxLength)
    {
        $words = explode(' ', $text);

        if (count($words) > $maxLength) {
            return implode(' ', array_slice($words, 0, $maxLength)) . '...';
        }
        return $text;
    }

    /**
     * @param $status
     * @return bool
     */
    public function statusCheck($status)
    {
        if (Auth::check()) {
            switch ($status) {
                case 'upvote':
                    return $this->postIsVoted(Auth::user()) === 'upvoted';
                case 'downvote':
                    return $this->postIsVoted(Auth::user()) === 'downvoted';
                case 'following':
                    return $this->postIsFollowing(Auth::user()) === 1;
            }
        }
    }

    /**
     * @param $text
     * @return string
     */
    public function readTime(string $text)
    {
        $word = str_word_count(strip_tags($text));
        $minutes = floor($word / 200);

        return $minutes . ' dəqiqə';
    }
}
