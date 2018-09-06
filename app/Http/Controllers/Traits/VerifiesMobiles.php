<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait VerifiesMobiles
{

    /**
     * Show the mobile verification notice.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showMobile(Request $request)
    {
        return $request->user()->hasVerifiedMobile()
            ? redirect($this->redirectPath())
            : view('auth.verify-mobile');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyMobile(Request $request)
    {
        if ($request->route('id') == $request->user()->getKey()) {
            $request->user()->markMobileAsVerified();
        }

        return redirect($this->redirectPath());
    }

    /**
     * Resend the sms verification notification.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function resendMobile(Request $request)
    {
        $request->user()->sendMobileVerificationNotification();

        return back()->with('resent', true);
    }
}
