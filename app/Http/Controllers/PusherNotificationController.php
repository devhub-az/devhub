<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class PusherNotificationController extends Controller{

    public function sendNotification(){
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'eu',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            '18773d19fae2cbb31941',
            '8143e44d004c1cc573d4',
            '838955', $options
        );

        $message= "Hello Cloudways";

        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('notification', 'notification-event', $message);
    }
}