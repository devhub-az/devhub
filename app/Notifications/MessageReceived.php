<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageReceived extends Notification
{
    use Queueable;
    /**
     * @var Message
     */
    private Message $message;

    const TYPE = 'Message';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     *
     * @return array
     */
    public function via()
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     *
     * @return MailMessage
     */
    public function toMail()
    {
        return (new MailMessage())
                    ->line($this->message->user->username.' size yazib')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     *
     * @return array
     */
    public function toDatabase()
    {
        return [
            'type'    => self::TYPE,
            'from'    => $this->message->user->username,
            'content' => $this->message,
        ];
    }
}
