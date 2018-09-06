<?php

namespace App\Listeners;

use App\Models\Contracts\MustVerifyMobile;
use Illuminate\Auth\Events\Registered;

class SendMobileVerificationNotification
{

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered $event
     *
     * @return void
     */
    public function handle(Registered $event)
    {
        if ($event->user instanceof MustVerifyMobile) {
            $event->user->sendMobileVerificationNotification();
        }
    }
}
