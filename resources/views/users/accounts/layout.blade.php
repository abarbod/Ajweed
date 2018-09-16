@extends('layouts.app')

@section('content')

    <div class="container mb-3 col-md-12">
        <nav class="nav nav-pills nav-justified bg-white">
            <a class="nav-item nav-link {{ Request::routeIs('users.account.*') ? 'active': '' }}"
               href="{{ route('users.account.index') }}">@lang('My Account')</a>

            <a class="nav-item nav-link {{ Request::routeIs('users.details.*') ? 'active': '' }}"
               href="{{ route('users.details.index') }}">@lang('Profile')</a>

            <a class="nav-item nav-link {{ Request::routeIs('users.applications.*') ? 'active': '' }}"
               href="{{ route('users.applications.index') }}">@lang('Applications')</a>

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
