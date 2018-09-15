<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDetailsRequest;
use App\Models\User;

class DetailsController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        if (! $user->hasCompleteProfile()) {
            return redirect()->route('users.account.index')->with('alert-danger', 'You do not have a profile yet 😢');
        }

        return view('users.accounts.details.index', compact('user'));
    }

    public function edit()
    {
        /** @var User $user */
        $user = auth()->user();

        if (! $user->hasCompleteProfile()) {
            return redirect()->route('users.account.index')->with('alert-danger', 'You do not have a profile yet 😢');
        }

        return view('users.accounts.details.edit', compact('user'));
    }

    /**
     * @param \App\Http\Requests\UserDetailsRequest $request
     *
     * @var User $user
     * @return array
     */
    public function update(UserDetailsRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if (! $user->hasCompleteProfile()) {
            return redirect()->route('users.account.index')->with('alert-danger', 'You do not have a profile yet 😢');
        }

        $data = $request->all();

        $data['preferred_times'] = implode(',', $data['preferred_times']);
        $data['languages'] = implode(',', $data['languages']);
        // skills filed is optional, we have to check if it exists in the $data array.
        $data['skills'] = isset($data['skills']) ? implode(',', $data['skills']) : null;

        $user->update($data);
        $user->profile->update($data);

        return redirect()->route('users.details.index')->with('status',
            __('Profile details were edited successfully.'));
    }
}
