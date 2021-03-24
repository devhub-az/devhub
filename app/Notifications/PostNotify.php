<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Str;

class PostNotify extends Notification
{
    use Queueable;

    protected Article $post;

    /**
     * Create a new notification instance.
     *
     * @param Article $post
     */
    public function __construct(Article $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     *
     * @return array
     */
    public function via(): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'     => $this->post->id,
            'title'  => $this->post->name,
            'slug'   => $this->post->slug,
            'avatar' => ($this->post->creator->avatar !== 'default') ? '/upload/avatars/'
                .$this->post->creator->avatar : config('devhub.default_avatar'),
            'body'       => Str::words($this->post->content, 150, ''),
            'author'     => $this->post->creator->username,
            'views'      => $this->post->views_count,
            'created_at' => $this->post->created_at,
        ];
    }
}
