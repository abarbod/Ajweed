@extends('layouts.app')

<?php
/**
 * @var \App\Models\User $user
 */
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.profile.store') }}"
                              aria-label="{{ __('Update Profile') }}">
                            @csrf

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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
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
