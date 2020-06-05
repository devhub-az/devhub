<?php
declare(strict_types = 1);

namespace App\Http\Resources;

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
        $body      = Purifier::clean($parsedown->text($this->body));

        return [
            'data' => [
                'id'             => $this->id,
                'title'          => $this->name,
                'body_short'     => \Str::words($body, 150, ''),
                'body'           => $body,
                'creator'        => new UserCollection($this->creator),
                'votes'          => $this->upvoters_count - $this->downvoters_count,
                'votes_sum'      => $this->voters_count,
                'upvotes'        => $this->upvoters_count,
                'downvotes'      => $this->downvoters_count,
                'tags'           => new HubsCollection(
                    Hub::whereIn(
                        'id',
                        $this->getHubsIdsAttribute()
                    )->select('id', 'name')->get()
                ),
                'comments_count' => $this->comments_count, //Comment::where('post_id', $this->id)->count(),
                'views'          => $this->views_count,
                'created_at'     => $this->created_at,
                'read_time'      => $this->readTime($body),
                'upvoted'        => $this->statusCheck('upvote'),
                'downvoted'      => $this->statusCheck('downvote'),
                'favorite'       => $this->statusCheck('favorites'),
                'favorites'      => $this->bookmarkers_count,
            ],
        ];
    }

    /**
     * @param string $text
     * @param int    $maxLength
     * @return string
     */
    public function shorten(string $text, int $maxLength): string
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
    public function statusCheck($status): bool
    {
        if (Auth::check()) {
            switch ($status) {
                case 'upvote':
                    return (bool) $this->isUpvotedBy(Auth::user()->id);
                case 'downvote':
                    return (bool) $this->isDownvotedBy(Auth::user()->id);
                case 'favorites':
                    return (bool) $this->isBookmarkedBy(Auth::user()->id);
                default:
                    return false;
            }
        }

        return false;
    }

    /**
     * @param $text
     * @return string
     */
    public function readTime(string $text): string
    {
        $word    = str_word_count(strip_tags($text));
        $minutes = floor($word / 200);

        return $minutes . ' dəqiqə';
    }
}
