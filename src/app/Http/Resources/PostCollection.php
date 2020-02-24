<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
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
                'id'             => $this->id,
                'title'          => $this->name,
                'body_short'     => \Str::words(Purifier::clean($parsedown->text($this->body)), 100, '…'),
                'body'           => \Purifier::clean($parsedown->text($this->body)),
                'creator'        => new UserCollection(User::where('id', $this->author_id)->select('username')->first()),
                'profile_image'  => '', // $this->getFirstMediaUrl('avatars'),
                'votes'          => $this->rating(),
                'votes_sum'      => $this->votes()->count(),
                'upvotes'        => $this->upvotes(),
                'downvotes'      => $this->downvotes(),
                'tags'           => new HubsCollection(Hub::whereIn('id',
                    $this->getHubsIdsAttribute())->withCount(['hubFollowers', 'posts'])->get()),
                'comments_count' => $this->comments()->count(), //Comment::where('post_id', $this->id)->count(),
                'views'          => $this->views->count(),
                'created_at'     => $this->created_at,
                'read_time'      => $this->readTime($this->body),
                'upvoted'        => $this->statusCheck('upvote'),
                'downvoted'      => $this->statusCheck('downvote'),
                'favorite'       => $this->statusCheck('favorites'),
                'favorites'      => $this->favorites->count(),
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
                case 'favorites':
                    return $this->postIsFollowing(Auth::user()) === true;
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
