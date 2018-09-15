@extends('users.accounts.layout')

@section('accounts.content')

    <h3 class="text-center">Details Page Here</h3>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>@lang('My Profile')</div>
            <a href="{{ route('users.profile.edit') }}">@lang('Edit')</a>
        </div>

        <div class="card-body">

            <img class="rounded float-right" height="150px" width="150px" src="{{ $user->avatarUrl('150') }}"
                 alt="{{ $user->first_name }}">

            <p><strong>@lang('Gender'): </strong>{{ __(ucfirst($user->profile->gender)) }}</p>
            <p><strong>@lang('Birth Date'): </strong>{{ $user->profile->birth_date->toDateString() }}</p>
        </div>
    </div>

@endsection
