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
                    <div class="card-header bg-secondary text-white">{{ $event->name }}</div>

                    <div class="card-body">
                        <p><strong>@lang('Description'): </strong>{{ $event->description }}</p>
                        <dl class="row">
                            <dt class="col-sm-3">@lang('Location')</dt>
                            <dd class="col-sm-9">{{ $event->location }}</dd>

                            <dt class="col-sm-3">@lang('Date')</dt>
                            <dd class="col-sm-9">
                                <p>{{ $event->start_at->toDateString() }} - {{ $event->end_at->toDateString() }}</p>
                            </dd>

                            <dt class="col-sm-3">@lang('Time')</dt>
                            <dd class="col-sm-9">{{ $event->start_time }} - {{ $event->end_time }}</dd>

                            <dt class="col-sm-3">@lang('Rewards')</dt>
                            <dd class="col-sm-9">
                                <ul>
                                    @foreach(explode(',', $event->rewards) as $reward)
                                        <li>{{ $reward }}</li>
                                    @endforeach
                                </ul>
                            </dd>

                            <dt class="col-sm-3">@lang('Number of people needed')</dt>
                            <dd class="col-sm-9">
                                <dl class="row">
                                    <dt class="col-sm-2">@lang('Male')</dt>
                                    <dd class="col-sm-4">{{ $event->count_male }}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-2">@lang('Female')</dt>
                                    <dd class="col-sm-4">{{ $event->count_female }}</dd>
                                </dl>
                            </dd>
                            <dt class="col-sm-3">@lang('Registration Status')</dt>
                            <dd class="col-sm-9">@lang($event->registration_status)
                            </dd>

                            @unless(is_null($event->published_at))
                                <dt class="col-sm-3">@lang('Date Published')</dt>
                                <dd class="col-sm-9">{{ $event->published_at->toDateString() }}</dd>
                            @else
                                <dt class="col-sm-3 text-danger">@lang('This event is not published.')</dt>
                            @endunless

                        </dl>
                    </div>

                    <div class="card-footer bg-transparent d-flex justify-content-center">

                        @if($event->registration_status === 'open')
                            @if(auth()->check())
                                <event-application-button
                                    :user-id="{{ auth()->id() }}"
                                    :event-id="{{ $event->id  }}"
                                ></event-application-button>
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
@endsection
