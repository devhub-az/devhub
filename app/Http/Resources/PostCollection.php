<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Hub;
use Parsedown;
use Purifier;
use Auth;

class PostCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $parsedown = new Parsedown();
        return [
            'data' => [
                'id' => $this->id,
                'title' => $this->name,
                'body' => $this->shorten(Purifier::clean($parsedown->text($this->body)), 1000),
                'creator' => $this->creator->username,
                'profile_image' => '',
                'votes' => $this->votes,
                'tags' => new HubsCollection(Hub::whereIn('id', $this->getHubsIdsAttribute())->withCount(['hubFollowers', 'posts'])->get()),
                'comments' => count($this->comments),
                'views' => count($this->views),
                'created_at' => $this->created_at,
                'read_time' => $this->readTime($this->body),
                'upvoted' => $this->statusCheck('upvote'),
                'downvoted' => $this->statusCheck('downvote'),
                'favorite' => $this->statusCheck('following'),
                'followers' => count($this->postFollowers),
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
        $shortText = substr($text, 0, $maxLength);

        return ((strrpos($shortText, ".") ? substr($shortText, 0, strrpos($shortText, ".")) : $shortText) . (strlen($text) > $maxLength ? '...' : ''));
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
                    return $this->postIsVoted(Auth::user()) === "upvoted";
                case 'downvote':
                    return $this->postIsVoted(Auth::user()) === "downvoted";
                case 'following':
                    return $this->postIsFollowing(Auth::user()) === "following";
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
