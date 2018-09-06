<?php

namespace App\Models\Traits;

use App\Notifications\VerifyMobile;

/**
 * This trait will be used by User model to implement Laravel MustVerifyEmail contract.
 * However, we will change it verify Mobile number.
 *
 * Trait MustVerifyMobile
 * @package App\Models\Traits
 */
trait MustVerifyMobile
{
    /**
     * Determine if the user has verified their mobile.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        return ! is_null($this->mobile_verified_at);
    }

    /**
     * Mark the given user's mobile as verified.
     *
     * @return void
     */
    public function markEmailAsVerified()
    {
        $this->forceFill(['mobile_verified_at' => $this->freshTimestamp()])->save();
    }

    /**
     * Send the SMS verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyMobile);
    }

}
