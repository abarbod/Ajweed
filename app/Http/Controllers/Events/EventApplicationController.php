<?php

namespace App\Http\Controllers\Events;

use App\Events\UserAppliedToParticipate;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Event;
use Symfony\Component\HttpFoundation\Response;

class EventApplicationController extends Controller
{

    /**
     * Get the user application(s?) for the given event.
     *
     * @param \App\Models\Event $event
     *
     * @return \App\Http\Resources\ApplicationResource|\Illuminate\Http\JsonResponse
     */
    public function index(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $application = $user->applications()->where('event_id', $event->id)->firstOrFail();

        return new ApplicationResource($application);
    }

    
    /**
     * Apply for an event.
     *
     * @param \App\Models\Event $event
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ApplyingForClosedEventException
     */
    public function store(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $application = $event->applyBy($user);

        event(new UserAppliedToParticipate($user, $event));

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * To withdraw an application.
     *
     * @param \App\Models\Event $event
     * @param \App\Models\Application $application
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Event $event, Application $application)
    {
        $this->authorize('delete', $application);

        $application->withdraw();

        return response()->json(['message' => __('Your application was withdrawn.')], Response::HTTP_ACCEPTED);
    }
}
