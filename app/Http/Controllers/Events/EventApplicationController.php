<?php

namespace App\Http\Controllers\Events;

use App\Exceptions\ApplyingForClosedEventException;
use App\Models\Application;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventApplicationController extends Controller
{

    /**
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\Response
     * @throws \App\Exceptions\ApplyingForClosedEventException
     */
    public function store(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $event->applyBy($user);

        return response()->json(['message' => 'ok'], 201);
    }

    public function destroy(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->pendingEvents()->detach($event->id);

        return back()->with('alert-info', __('Your application was canceled.'));
    }
}
