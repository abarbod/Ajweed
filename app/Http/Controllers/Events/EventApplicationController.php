<?php

namespace App\Http\Controllers\Events;

use App\Models\Application;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventApplicationController extends Controller
{

    /**
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->pendingEvents()->save($event);

        return back()->with('alert-success', __('Thank you, your application was received.'));
    }

    public function destroy(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->pendingEvents()->detach($event->id);

        return back()->with('alert-info', __('Your application was canceled.'));
    }
}
