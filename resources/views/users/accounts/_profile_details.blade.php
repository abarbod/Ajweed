<?php
/**
 * @var \App\Models\User $user
 */
?>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div>@lang('My Profile')</div>
        <a href="{{ route('users.profile.edit') }}">@lang('Edit')</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

            <img class="rounded float-right" height="150px" width="150px" src="{{ $user->avatar('150') }}" alt="{{ $user->first_name }}">

        <p><strong>@lang('Gender'): </strong>{{ __(ucfirst($user->profile->gender)) }}</p>
        <p><strong>@lang('Birth Date'): </strong>{{ $user->profile->birth_date->toDateString() }}</p>
    </div>
</div>
