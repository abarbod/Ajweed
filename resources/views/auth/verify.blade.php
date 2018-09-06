@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verify Your Email Address</div>

                    <div class="card-body">
                        @if (session('sms-url'))
                            <div class="alert alert-warning text-left" role="alert">
                                <strong>Notice</strong>
                                <p>During development,
                                    and because my mobily.ws account cannot send sms to
                                    people who blocked ads,
                                    I'm attaching the link to the mobile verification url for testing purposes.
                                </p>
                                <p>Click <a href="{{ session('sms-url') }}">this link</a> to verify your mobile.</p>
                            </div>
                        @endif
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                A fresh verification link has been sent to your email address.
                            </div>
                        @endif

                        Before proceeding, please check your email for a verification link.
                        If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to
                            request another</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
