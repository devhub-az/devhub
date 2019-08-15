<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\CommonMarkConverter;
use App\Http\Resources\HubsCollection;
use App\Models\Hubs;
use Parsedown;

class PostCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $parsedown = new Parsedown();
        return [
            'data' => [
                'id' => $this->id,
                'title' => $this->name,
                'body' => $this->shorten($parsedown->text($this->body), 1000),
                'creator' => $this->creator->username,
                'profile_image' => $this->creator->getMedia('avatars')->first()->getUrl('small'),
                'votes' => $this->votes,
                'tags' => new HubsCollection(Hubs::whereIn('id', $this->getHubsIdsAttribute())->withCount(['hubFollowers', 'posts'])->get()),
                'comments' => count($this->comments),
                'views' => count($this->views),
                'created_at' => $this->created_at,
                'read_time' => $this->readTime($this->body),
                'upvoted' => $this->statusCheck('upvote'),
                'downvoted' => $this->statusCheck('downvote'),
                'favorite' => $this->statusCheck('folowing'),
                'folowers' => count($this->postFollowers),
            ],
        ];
    }

    public function shorten(string $text, int $maxLength) {
        $shortText = substr($text, 0, $maxLength);

        return ((strrpos($shortText, ".") ? substr($shortText, 0, strrpos($shortText, ".")) : $shortText) . (strlen($text) > $maxLength ? '...' : ''));
    }

    public function statusCheck($status)
    {
        if (Auth::check()){
            switch ($status) {
                case 'upvote':
                    return $this->postIsVoted(Auth::user()) == "upvoted";
                case 'downvote':
                    return $this->postIsVoted(Auth::user()) == "downvoted";
                case 'folowing':
                    return $this->postIsFollowing(Auth::user()) == "folowing";
            }
        }
    }

    public function readTime($text){
        $word = str_word_count(strip_tags($text));
        $m = floor($word / 200);
        $est = $m . ' dəqiqə';
        return $est;
    }
}
