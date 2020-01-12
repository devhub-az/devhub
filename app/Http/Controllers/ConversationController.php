<?php

namespace App\Http\Controllers;

use App\Http\Repository\ConversationRepository;
use App\Http\Requests\SendMessage;
use App\Models\User;
use App\Notifications\MessageReceived;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{

    private AuthManager $auth;
    private ConversationRepository $repo;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth)
    {
        $this->auth = $auth;
        $this->repo = $conversationRepository;
    }

    public function index()
    {
        return view('pages.conversations.index', [
            'users'             => $this->repo->getConversations($this->auth->user()->id),
            'unread'            => $this->repo->unReadCount(Auth::user()->id),
            'last_message'      => $this->shorten($this->repo->getLastMessage(Auth::user()->id)->content ?? '', 6),
            'last_message_time' => $this->repo->getLastMessage(Auth::user()->id)->created_at ?? '',
        ]);
    }

    public function show(Request $request, int $id)
    {
        $me = $this->auth->user();
        $user = User::findOrFail($id);
        $messages = $this->repo->getMessagesFor($me->id, $user->id)->get();
        $unread = $this->repo->unReadCount($me->id);
        if (isset($unread[$user->id])) {
            $this->repo->readAllFrom($user->id, $me->id);
            unset($unread[$user->id]);
        }
        return view('pages.conversations.show', [
            'users'             => $this->repo->getConversations($this->auth->user()->id),
            'user'              => $user,
            'messages'          => $this->paginate($messages),
            'last_message'      => $messages->first() ? $this->shorten(decrypt($messages->first()->content), 6) : null,
            'last_message_time' => $messages->first()->created_at ?? '',
            'unread'            => $unread,
        ]);
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    private function shorten(string $text, int $maxLength)
    {
        $words = explode(' ', $text);

        if (count($words) > $maxLength) {
            return implode(' ', array_slice($words, 0, $maxLength)) . '...';
        }
        return $text;
    }

    public function store(int $id, Request $request)
    {
        $user = User::findorfail($id);
        $message = $this->repo->createMessage(
            encrypt($request->get('content')),
            $this->auth->user()->id,
            $id,
            );
        return redirect(route('conversations.show', ['id' => $id]));
    }

    public function sendMessage(User $user, SendMessage $req)
    {
        $this->repo->create(
            $req->get('content'),
            Auth::user()->id,
            $user->id
        );
        return redirect()->route('messages.show', ['id' => $user]);
    }
}
