@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('Register')</div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('register') }}"
                              aria-label="@lang('Register')"
                              enctype="multipart/form-data">
                        @csrf
                        <!-- Username -->
                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right required">@lang('Username')</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- E-mail -->
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right required">@lang('E-Mail Address')</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right required">@lang('Password')</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="form-group row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right required">@lang('Mobile Number')</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text"
                                           class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                           name="mobile" value="{{ old('mobile') }}" required>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                    @else
                                        <span class="form-text text-muted">
                                    <strong>@lang('Example:') 05xxxxxxxx</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Saudi Id / Iqama Id -->
                            <div class="form-group row">
                                <label for="official_id"
                                       class="col-md-4 col-form-label text-md-right required">@lang('Saudi Id / Iqama Id')</label>

                                <div class="col-md-6">
                                    <input id="official_id" type="text"
                                           class="form-control{{ $errors->has('official_id') ? ' is-invalid' : '' }}"
                                           name="official_id" value="{{ old('official_id') }}" required>

                                    @if ($errors->has('official_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('official_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- avatar -->
                            <div class="form-group row">
                                <label for="avatar"
                                       class="col-md-4 col-form-label text-md-right">@lang('avatar')</label>

                                <div class="col-md-6">
                                    <input type="file" name="avatar" accept="image/*"
                                           class="form-control-file{{ $errors->has('avatar') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        @include('users.accounts._details_form_inputs')

                        <!-- Register btn +  Already have an account? -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                    <a href="{{ route('login') }}" class="btn btn-link">
                                        @lang('Already have an account?')
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        @lang('Register')
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
