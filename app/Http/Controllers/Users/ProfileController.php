<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** @var User $user */
        $user = auth()->user();

        if ( ! is_null($user->profile)) {
            // The user has a profile should not be able to create a new one.
            return redirect()->route('users.profile.show', $user);
        }

        return view('users.profiles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gender'     => ['required', 'in:male,female'],
            'birth_date' => ['required', 'date', 'before:13 years ago'],
        ]);

        /** @var User $user */
        $user = auth()->user();

        if ( ! is_null($user->profile)) {
            // The user has a profile should not be able to create a new one.
            return redirect()->route('users.profile.show', $user);
        }

        $profile = Profile::query()->make($data);

        $user->profile()->save($profile);

        return redirect()->route('users.profile.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $profile = $user->profile;

        return view('users.profiles.show', compact('user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.profiles.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Profile      $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
