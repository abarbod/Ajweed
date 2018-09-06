@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('Verify Mobile Number')</div>

                    <div class="card-body">
                        {{-- Temporary part should be removed when we use ajaweed account. --}}
                        @if (session('sms-url'))
                            <div class="alert alert-warning text-right" role="alert">
                                <strong>Notice</strong>
                                <p>During development,
                                    and because my mobily.ws account cannot send sms to
                                    people who blocked ads,
                                    I'm attaching the link to the mobile verification url for testing purposes.
                                </p>
                                <p>Click <a href="{{ session('sms-url') }}">this link</a> to verify your mobile.</p>
                            </div>
                            <?php session()->forget('sms-url'); ?>
                        @endif
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                @lang('A fresh verification link has been sent to your mobile number.')
                            </div>
                        @endif

                        <p>@lang('Before proceeding, please check your mobile for a verification link.')</p>
                        <p>@lang('If you did not receive the SMS,')
                            <a href="{{ route('verification.resend-mobile') }}">
                                @lang('click here to get a new SMS')
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
