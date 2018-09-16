@extends('users.accounts.layout')

<?php /** @var \App\Models\Application $application */ ?>
@section('accounts.content')

    @if(auth()->user()->applications->count())
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>@lang('Event')</th>
                    <th>@lang('Location')</th>
                    <th>@lang('Date')</th>
                    <th>@lang('Application Status')</th>
                </tr>
                </thead>
                <tbody>
                @foreach (auth()->user()->applications as $application)
                    <tr>
                        <td scope="row">
                            <a href="{{ route('events.show', $application->event) }}">{{ $application->event->name }}</a>
                        </td>
                        <td>{{ $application->event->location }}</td>
                        <td>{{ $application->event->start_at->toDateString() }}</td>
                        <td>{{ $application->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3 class="text-center">You don't have any applications yet 😢</h3>
    @endif

@endsection
