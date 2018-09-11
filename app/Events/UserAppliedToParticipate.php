<?php

namespace App\Events;

use App\Models\Event;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This event will be fired when a user apply to participate in an event.
 *
 * Class UserAppliedToParticipate
 * @package App\Events
 */
class UserAppliedToParticipate
{
    use Dispatchable, SerializesModels;

    /** @var \App\Models\User */
    public $user;

    /**  @var \App\Models\Event */
    public $event;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Event $event
     */
    public function __construct(User $user, Event $event)
    {
        $this->user  = $user;
        $this->event = $event;
    }

}
