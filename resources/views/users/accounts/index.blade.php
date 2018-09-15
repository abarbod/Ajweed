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
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <span class="profile-field-label">@lang('Username')</span>
                                <br>
                                <span class="profile-field-value">{{ $user->username }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-field-label">@lang('Email Address')</span>
                                <br>
                                <span class="profile-field-value">{{ $user->email }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-field-label">@lang('Mobile Number')</span>
                                <br>
                                <span class="profile-field-value">{{ $user->mobile }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="profile-field-label">@lang('Saudi Id / Iqama Id')</span>
                                <br>
                                <span class="profile-field-value">{{ $user->official_id }}</span>
                            </td>
                        </tr>
                        <tr><td></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
