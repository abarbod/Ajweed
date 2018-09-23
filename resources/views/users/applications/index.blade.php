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
                        @switch($application->status)
                            @case("accepted")
                                <td><span style="line-height:2; display:block" class="badge badge-success">{{ $application->status }}</span></td>
                                @break
                            @case("rejected")
                                <td><span style="line-height:2; display:block" class="badge badge-danger">{{ $application->status }}</span></td>
                                @break
                            @case("processing")
                                <td><span style="line-height:2; display:block" class="badge badge-primary">{{ $application->status }}</span></td>
                                @break
                            @case("on-hold")
                                <td><span style="line-height:2; display:block" class="badge badge-secondary">{{ $application->status }}</span></td>
                                @break
                        @endswitch
                        
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3 class="text-center">You don't have any applications yet 😢</h3>
    @endif

@endsection
