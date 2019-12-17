<?php

namespace App\Transformers;

use Auth;
use App\Models\Post;
use League\Fractal\TransformerAbstract;
use Purifier;
use Parsedown;

class PostTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var  array
     */
    protected $availableIncludes = ['author', 'categories'];

    /**
     * List of resources to automatically include
     *
     * @var  array
     */
    protected $defaultIncludes = ['author'];

    /**
     * Transform object into a generic array
     *
     * @var  object
     * @return array
     */
    public function transform(Post $post)
    {
        $parsedown = new Parsedown();
        return [
            'id'            => $post->id,
            'title'         => $post->name,
            'body'          => $this->shorten(Purifier::clean($parsedown->text($post->body)), 1000),
            'creator'       => $post->creator->username,
            'profile_image' => '', // $post->getFirstMediaUrl('avatars'),
            'votes'         => $post->votes,
            'comments'      => count($post->comments),
            'views'         => count($post->views),
            'created_at'    => $post->created_at,
            'read_time'     => $this->readTime($post->body),
            'upvoted'       => $this->statusCheck('upvote'),
            'downvoted'     => $this->statusCheck('downvote'),
            'favorite'      => $this->statusCheck('following'),
            'followers'     => count($post->postFollowers),
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

        return (strrpos($shortText, '.') ? substr($shortText, 0,
                strrpos($shortText, '.')) : $shortText) . (strlen($text) > $maxLength ? '...' : '');
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
                    return $this->postIsFollowing(Auth::user()) === 'following';
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

    public function includeAuthor(Post $post){
        return $this->item($post->author, new UserTransformer);
    }

    public function includeCategories(Post $post){
        return $this->collection($post->categories, new CategoryTransformer);
    }
}
