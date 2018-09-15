@extends('users.accounts.layout')

<?php /** @var \App\Models\User $user */ ?>

@section('accounts.content')

    <div class="card">
        <div class="card-header d-flex justify-content-between bg-transparent">
            <div>@lang('My Profile')</div>
            <a href="{{ route('users.details.edit') }}">@lang('Edit')</a>
        </div>

        <div class="card-body">

            <div class="table-responsive text-center">
                <table class="table table-sm table-striped table-inverse">
                    <thead class="thead-dark">
                    <tr>
                        <th>@lang('First Name')</th>
                        <th>@lang('Father Name')</th>
                        <th>@lang('Grandfather Name')</th>
                        <th>@lang('Last Name')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->father_name }}</td>
                        <td>{{ $user->grandfather_name }}</td>
                        <td>{{ $user->last_name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            {{-- Personal Details --}}
            <div class="media align-items-center px-5">
                <img class="align-self-center rounded-circle order-last" height="150px" width="150px"
                     src="{{ $user->avatarUrl('150') }}"
                     alt="{{ $user->first_name }}">
                <div class="media-body">
                    <p><strong>@lang('Gender'): </strong>{{ __($user->profile->gender) }}</p>
                    <p><strong>@lang('Birth Date'): </strong>{{ $user->profile->birth_date->toDateString() }}
                    <p><strong>@lang('City'): </strong>{{ $user->profile->city }}</p>
                </div>
            </div>
            <hr>
            {{-- Experience and Skills --}}
            <div class="row">
                <p class="col-6"><strong>@lang('Academic Degree'): </strong>{{ $user->profile->academic_degree }}</p>
                <p class="col-6"><strong>@lang('occupation'): </strong>{{ $user->profile->occupation }}</p>
                <p class="col-6"><strong>@lang('Preferred Times'): </strong>{{ $user->profile->preferred_times }}</p>
                <p class="col-6"><strong>@lang('Typing Speed'): </strong>{{ $user->profile->typing_speed }}</p>

                <p class="col-12"><strong>@lang('Experiences'): </strong>{{ $user->profile->experiences }}</p>

                <div class="col-6"><strong>@lang('Languages'): </strong>
                    <ul>
                        @foreach(explode(',', $user->profile->languages) as $language)
                            <li>{{ $language }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-6"><strong>@lang('skills'): </strong>
                    <ul>
                        @foreach(explode(',', $user->profile->skills) as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <p class="col-6"><strong>@lang('Twitter'): </strong>{{ $user->profile->twitter ?? '-' }}</p>
                <p class="col-6"><strong>@lang('Instagram'): </strong>{{ $user->profile->instagram ?? '-' }}</p>
            </div>

        </div>

    </div>

@endsection
