@extends('layouts.app')

@section('content')

    <div class="container mb-3">
        <nav class="nav nav-pills nav-justified">
            <a class="nav-item nav-link {{ Request::routeIs('users.account.index') ? 'active': '' }}"
               href="{{ route('users.account.index') }}">@lang('My Account')</a>

            <a class="nav-item nav-link {{ Request::routeIs('users.details.index') ? 'active': '' }}"
               href="{{ route('users.details.index') }}">@lang('Profile')</a>

        </nav>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @yield('accounts.content')

            </div>
        </div>
    </div>
@endsection
