<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{

    /**
     * Withdraw an application to participate in an event.
     *
     * @param  \App\Models\Application $application
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);

        $application->update(['status' => 'withdrawn']);

        return response()->json([
            'message' => __('Your application was withdrawn.'),
        ], Response::HTTP_ACCEPTED);
    }
}
