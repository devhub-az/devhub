<?php

declare(strict_types=1);

namespace App\Http\Repository;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ConversationRepository
{
    private User    $user;

    private Message $message;

    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    public function getConversations(int $userId)
    {
        return $this->user->newQuery()
            ->select('username', 'id', 'about')
            ->where('id', '!=', $userId)
            ->get();
    }

    public function createMessage(string $content, int $from, int $to)
    {
        return $this->message->newQuery()->create(
            [
                'content'    => $content,
                'from_id'    => $from,
                'to_id'      => $to,
                'created_at' => now(),
            ]
        );
    }

    public function getLastMessage(int $userId)
    {
        return $this->message->newQuery()
            ->select('content', 'created_at')
            ->where('id', '!=', $userId)
            ->first();
    }

    public function getMessagesFor(int $from, int $to): Builder
    {
        return $this->message->newQuery()
            ->whereRaw("((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
            ->orderBy('created_at', 'desc')
            ->with(
                [
                    'user' => static function ($query) {
                        return $query->select('username', 'id');
                    },
                ]
            );
    }

    /**
     * @param int $userId
     *
     * @return Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function unReadCount(int $userId)
    {
        return $this->message->newQuery()
            ->where('to_id', $userId)
            ->groupBy('from_id')
            ->selectRaw('from_id, COUNT(id) as count')
            ->whereRaw('read_at IS NULL')
            ->get()
            ->pluck('count', 'from_id');
    }

    public function readAllFrom(int $from, int $to): int
    {
        return $this->message->newQuery()
            ->where('from_id', $from)
            ->where('to_id', $to)
            ->update(['read_at' => Carbon::now()]);
    }
}
