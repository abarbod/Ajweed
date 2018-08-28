@extends('layouts.app')

<?php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $events
 * @var \App\Models\Event                           $event
 */
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mb-3">
                    <div class="card-header">@lang('Events')</div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">@lang('Name')</th>
                                    <th scope="col">@lang('Date')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td scope="row"><a href="/">{{ $event->name }}</a></td>
                                        <td>{{ $event->start_at->toDateString() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
