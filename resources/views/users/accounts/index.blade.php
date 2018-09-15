@extends('users.accounts.layout')

<?php
/**
 * @var \App\Models\User $user Current authenticated user.
 */
?>

@section('accounts.content')
    @unless($user->hasCompleteProfile())
        <div class="alert alert-danger d-flex justify-content-between h5" role="alert">
            @lang('Please complete your profile to be able to participate in our events.')
            <a class="btn btn-outline-danger float-right"
               href="{{ route('users.profile.create') }}">@lang('Edit Profile')</a>
        </div>
    @endunless

    <div class="card mb-3">
        <div class="card-header">@lang('My Account')</div>

        <div class="card-body">
            <h5 class="card-title mb-3">@lang('Username'): {{ $user->username }}</h5>
            <h5 class="card-title mb-3">@lang('Email Address'): {{ $user->email }}</h5>
            <h5 class="card-title mb-3">@lang('Mobile Number'): {{ $user->mobile }}</h5>
            <h5 class="card-title mb-3">@lang('Saudi Id / Iqama Id'): {{ $user->official_id }}</h5>
        </div>
    </div>

@endsection
