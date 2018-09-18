@extends('layouts.app')

<?php
/**
 * @var \App\Models\Event $event
 * @var \App\Models\User $user
 * @var \App\Models\Application $application
 */
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mb-3">
                    <div class="card-header">{{ $event->name }}</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <span class="profile-field-label">@lang('Description')</span>
                                            <br>
                                            <span class="profile-field-value">{{ $event->description }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="profile-field-label">@lang('Location')</span>
                                            <br>
                                            <span class="profile-field-value">{{ $event->location }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="profile-field-label">@lang('Date')</span>
                                            <br>
                                            <span class="profile-field-value">{{ $event->start_at->toDateString() }} - {{
                                            $event->end_at->toDateString() }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="profile-field-label">@lang('Time')</span>
                                            <br>
                                            <span class="profile-field-value">{{ $event->start_time }} - {{
                                            $event->end_time }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="profile-field-label">@lang('Rewards')</span>
                                            <br>
                                            <span class="profile-field-value">
                                            <ul>
                                                @foreach(explode(',', $event->rewards) as $reward)
                                                    <li>{{ $reward }}</li>
                                                @endforeach
                                            </ul>
                                        </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="profile-field-label">@lang('Number of people needed')</span>
                                            <br>
                                            <span
                                                class="profile-field-value">@lang('Male') {{ $event->count_male }}</span>
                                            <br>
                                            <span
                                                class="profile-field-value">@lang('Female') {{ $event->count_female }}</span>
                                        </td>
                                    </tr>
                                    @unless(is_null($event->published_at))
                                        <tr>
                                            <td>
                                                <span class="profile-field-label">@lang('Date Published')</span>
                                                <br>
                                                <span
                                                    class="profile-field-value">{{ $event->published_at->toDateString() }}</span>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>
                                            <span
                                                class="profile-field-label">@lang('This event is not published.')</span>
                                            </td>
                                        </tr>
                                    @endunless
                                    <tr>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent">

                        <div class="row justify-content-center">
                            <div class="col-6 text-center">
                                @if($event->registration_status === 'open')
                                    @if(auth()->check())
                                        <event-application-button
                                            :user-id="{{ auth()->id() }}"
                                            :event-id="{{ $event->id  }}"
                                        />
                                    @else
                                        <a href="#" class="btn btn-lg btn-outline-secondary text-center"
                                           onclick="event.preventDefault(); window.location = '/register'">
                                            @lang('Join Ajaweed\'s team to participate in this event')
                                        </a>
                                    @endif
                                @else
                                    <h3 class="text-center">@lang('Registration is closed for this event.')</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
