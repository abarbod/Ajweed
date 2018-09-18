@extends('layouts.app')

<?php
/**
 * @var \App\Models\Event $event
 */
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-3">
                <div class="card-header">{{ $event->name }}</div>
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
                                        <span class="profile-field-value">@lang('Male') {{ $event->count_male }}</span>
                                        <br>
                                        <span class="profile-field-value">@lang('Female') {{ $event->count_female }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="profile-field-label">@lang('Registration Status')</span>
                                        <br>
                                        <span class="profile-field-value">@lang($event->registration_status)</span>
                                    </td>
                                </tr>
                                @unless(is_null($event->published_at))
                                <tr>
                                    <td>
                                        <span class="profile-field-label">@lang('Date Published')</span>
                                        <br>
                                        <span class="profile-field-value">{{ $event->published_at->toDateString() }}</span>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td>
                                        <span class="profile-field-label">@lang('This event is not published.')</span>
                                    </td>
                                </tr>
                                @endunless
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        @if($event->registration_status === 'open')
                        @if(auth()->check() && $event->applicants()->where('user_id', auth()->id())->exists())
                        <div class="col-12 mb-2">
                            <a href="#" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('events-cancel-application-form').submit()">
                                @lang('Cancel your application')
                            </a>
                        </div>
                        <form id="events-cancel-application-form" action="{{ route('events.applications.destroy', $event) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                        @else
                        <div class="col-12 mb-2">
                            <a href="#" class="btn btn-block btn-outline-success" onclick="event.preventDefault(); document.getElementById('events-apply-form').submit()">
                                @lang('Apply')
                            </a>
                        </div>
                        <form id="events-apply-form" action="{{ route('events.applications.store', $event) }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
