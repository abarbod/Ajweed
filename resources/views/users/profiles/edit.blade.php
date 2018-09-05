@extends('layouts.app')

<?php
/**
 * @var \App\Models\User    $user
 * @var \App\Models\Profile $profile
 */
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.profile.update', $profile) }}"
                              aria-label="{{ __('Update Profile') }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                               type="radio" name="gender"
                                               {{ old('gender', $profile->gender) === 'ذكر' ? 'checked': '' }}
                                               id="maleRadio" value="ذكر">
                                        <label class="form-check-label" for="maleRadio">
                                            {{ __('Male') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                               type="radio" name="gender"
                                               {{ old('gender', $profile->gender) === 'أنثى' ? 'checked': '' }}
                                               id="femaleRadio" value="أنثى">
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

                            <div class="form-group row">
                                <label for="birth_date"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="date"
                                           class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}"
                                           max="{{ (new \DateTime('-13 years'))->format('Y-m-d') }}"
                                           name="birth_date"
                                           value="{{ old('birth_date', optional($profile->birth_date)->toDateString()) }}">

                                    @if ($errors->has('birth_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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
