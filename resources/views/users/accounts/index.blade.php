@extends('layouts.app')

<?php
/**
 * @var \App\Models\User $user Current authenticated user.
 */
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5 class="card-title">{{ $user->name }}</h5>
                    </div>
                </div>

                @includeWhen($user->hasCompleteProfile() , 'users.accounts._profile_details', ['user' => $user])

            </div>
        </div>
    </div>
@endsection
