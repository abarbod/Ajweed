@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- E-Mail Address -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Saudi Id / Iqama Id -->
                        <div class="form-group row">
                            <label for="official_id" class="col-md-4 col-form-label text-md-right">{{ __('Saudi Id / Iqama Id') }}</label>

                            <div class="col-md-6">
                                <input id="official_id" type="text" class="form-control{{ $errors->has('official_id') ? ' is-invalid' : '' }}" name="official_id" value="{{ old('official_id') }}" required>

                                @if ($errors->has('official_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('official_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--  Mobile Number -->
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @else
                                    <span class="form-text text-muted">
                                        <strong>Example: 05xxxxxxxx</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row">
                            <label for="gender"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                           type="radio" name="gender"
                                           {{ old('gender') === 'male' ? 'checked': '' }}
                                           id="maleRadio" value="male">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Male') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                           type="radio" name="gender"
                                           {{ old('gender') === 'female' ? 'checked': '' }}
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Female') }}
                                    </label>
                                </div>

                                @if ($errors->has('gender'))
                                    <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Birth Date -->
                        <div class="form-group row">
                            <label for="birth_date"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date"
                                       class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}"
                                       max="{{ (new \DateTime('-13 years'))->format('Y-m-d') }}"
                                       name="birth_date" value="{{ old('birth_date') }}">

                                @if ($errors->has('birth_date'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Public Profile -->
                        <div class="form-group row">
                            <label for="is_public"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Public Profile') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input
                                            class="form-check-input{{ $errors->has('is_public') ? ' is-invalid' : '' }}"
                                            type="checkbox" name="is_public"
                                            {{ old('is_public') ? 'checked': '' }}
                                            id="isPublic" value="1">
                                    <label class="form-check-label" for="isPublic">
                                        @lang('Make my profile public.')
                                    </label>
                                    <span class="form-text text-muted">
                                        <strong>@lang('Your profile page will be accessible to the public and shows basic details about you.')</strong>
                                    </span>
                                </div>

                                @if ($errors->has('is_public'))
                                    <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('is_public') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Register btn +  Already have an account? -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <a href="{{ route('login') }}" class="btn btn-link">
                                    {{ __('Already have an account?') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
