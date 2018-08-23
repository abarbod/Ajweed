@extends('layouts.app')
<?php
/**
 * Profile page. To show the user's profile.
 *
 * @var \App\Models\User    $user The user associated with the profile.
 * @var \App\Models\Profile $profile The users's profile.
 */

?>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p><strong>Gender: </strong>{{ $profile->gender }}</p>
                        <p><strong>Birth Date: </strong>{{ $profile->birth_date->toDateString() }}</p>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-info float-right" href="{{ route('users.profile.edit', $user) }}">@lang('Edit')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
