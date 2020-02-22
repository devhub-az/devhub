<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use Parsedown;

class PostNotify extends Notification
{
    use Queueable;

    protected $post;
    const TYPE = "Paylaşma";

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray(string $notifiable): array
    {
        $parsedown = new Parsedown();
        return [
            'type' => self::TYPE,
            'id' => $this->post->id,
            'title' => $this->post->name,
            'body' => $this->shorten(Purifier::clean($parsedown->text($this->post->body)), 250),
            'creator' => $this->post->creator->username,
            'profile_image' => '', // $this->getFirstMediaUrl('avatars'),
            'created_at' => $this->post->created_at,
        ];
    }

    /**
     * shortens the supplied text after last word
     * @param $text
     * @param $limit
     * @return string
     */
    function shorten($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}
