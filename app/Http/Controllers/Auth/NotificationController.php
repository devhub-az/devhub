<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\HubsCollection;
use App\Models\Hub;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $top_hubs = new HubsCollection(Hub::orderBy('rating', 'DESC')->take(5)->get());
        $top_followed_hubs = new HubsCollection(Hub::withCount('hubFollowers')->orderBy('hub_followers_count',
            'desc')->take(5)->get());
        \Auth::user()->unreadNotifications->markAsRead();
        return view('auth.notification.tracker',[
            'top_hubs'          => $top_hubs,
            'top_followed_hubs' => $top_followed_hubs,
        ]);
    }
}
