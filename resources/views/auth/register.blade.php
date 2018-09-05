@extends('layouts.app')
<?php

/** @var array $citiesList list of cities to use in the select city field. Key will be the value */
$citiesList = [
    'أبها'            => 'أبها',
    'الباحة'          => 'الباحة',
    'الجوف'           => 'الجوف',
    'الحدود الشمالية' => 'الحدود الشمالية',
    'الخبر'           => 'الخبر',
    'الدمام'          => 'الدمام',
    'الرياض'          => 'الرياض',
    'القصيم'          => 'القصيم',
    'المدينة المنورة' => 'المدينة المنورة',
    'تبوك'            => 'تبوك',
    'جازان'           => 'جازان',
    'جده'             => 'جده',
    'حائل'            => 'حائل',
    'مكة المكرمة'     => 'مكة المكرمة',
    'نجران'           => 'نجران',
];

$academicDegrees = [
    'ثانوي'     => 'ثانوي',
    'دبلوم'     => 'دبلوم',
    'بكالوريوس' => 'بكالوريوس',
    'ماجستير'   => 'ماجستير',
    'دكتوراة'   => 'دكتوراة',
];

$occupations = [
    'طالب'  => 'طالب',
    'خريج'  => 'خريج',
    'موظف'  => 'موظف',
    'متسبب' => 'متسبب',
];

$skills = [
    'Public Relations' => __('Public Relations'),
    'Marketing'        => __('Marketing'),
    'editing'          => __('Editing'),
    'Communication'    => __('Communication'),
    'Presentation'     => __('Planning'),
    'MS Office'        => __('MS Office'),
    'Design'           => __('Design'),
    'Graphics'         => __('Graphics'),
    'Motion graphics'  => __('Motion graphics'),
    'Photographer'     => __('Photographer'),
    'Draw'             => __('Draw'),
    'video_filming'    => __('Video filming'),
];

$typingSpeeds = [
    'ممتاز 90 - 100'   => 'ممتاز 90 - 100',
    'جيد جداً 80 - 90' => 'جيد جداً 80 - 90',
    'جيد 70 - 80'      => 'جيد 70 - 80',
    'مقبول 60 - 70'    => 'مقبول 60 - 70',
    'غير متمكن'        => 'غير متمكن',
];

$languagesList = [
    'العربية'    => 'العربية',
    'الانجليزية' => 'الانجليزية',
    'الفرنسية'   => 'الفرنسية',
    'الاسبانية'  => 'الاسبانية',
    'الألمانية'  => 'الألمانية',
    'التركية'    => 'التركية',
];

?>
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
                              novalidate
                              enctype="multipart/form-data">
                        @csrf
                        <!-- Username -->
                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">@lang('Username')</label>

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
                                       class="col-md-4 col-form-label text-md-right">@lang('E-Mail Address')</label>

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
                                       class="col-md-4 col-form-label text-md-right">@lang('Password')</label>

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

                            <!-- avatar -->
                            <div class="form-group row">
                                <label for="avatar"
                                       class="col-md-4 col-form-label text-md-right">@lang('avatar')</label>

                                <div class="col-md-6">
                                    <input type="file" name="avatar" accept="image/*"
                                           class="form-control-file{{ $errors->has('first_name') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- First Name -->
                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">@lang('First Name')</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ old('first_name') }}" required>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Father Name -->
                            <div class="form-group row">
                                <label for="father_name"
                                       class="col-md-4 col-form-label text-md-right">@lang('Father Name')</label>

                                <div class="col-md-6">
                                    <input id="father_name" type="text"
                                           class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}"
                                           name="father_name" value="{{ old('father_name') }}" required>

                                    @if ($errors->has('father_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Grandfather Name -->
                            <div class="form-group row">
                                <label for="grandfather_name"
                                       class="col-md-4 col-form-label text-md-right">@lang('Grandfather Name')</label>

                                <div class="col-md-6">
                                    <input id="grandfather_name" type="text"
                                           class="form-control{{ $errors->has('grandfather_name') ? ' is-invalid' : '' }}"
                                           name="grandfather_name" value="{{ old('grandfather_name') }}" required>

                                    @if ($errors->has('grandfather_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('grandfather_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">@lang('Last Name')</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name" value="{{ old('last_name') }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">@lang('Gender')</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                               type="radio" name="gender"
                                               {{ old('gender') === 'ذكر' ? 'checked': '' }}
                                               id="maleRadio" value="ذكر">
                                        <label class="form-check-label" for="maleRadio">
                                            @lang('Male')
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                               type="radio" name="gender"
                                               {{ old('gender') === 'أنثى' ? 'checked': '' }}
                                               id="femaleRadio" value="أنثى">
                                        <label class="form-check-label" for="femaleRadio">
                                            @lang('Female')
                                        </label>
                                    </div>

                                    @if ($errors->has('gender'))
                                        <span class="d-block invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="form-group row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right">@lang('Mobile Number')</label>

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
                                       class="col-md-4 col-form-label text-md-right">@lang('Saudi Id / Iqama Id')</label>

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

                            <!-- Birth Date -->
                            <div class="form-group row">
                                <label for="birth_date"
                                       class="col-md-4 col-form-label text-md-right">@lang('Birth Date')</label>

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

                            <!-- City -->
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">@lang('City')</label>

                                <div class="col-md-6">
                                    <select
                                        class="form-control form-select required {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                        id="city" name="city">
                                        <option selected disabled>- اختر -</option>
                                        @foreach($citiesList as $key => $city)
                                            <option
                                                value="{{ $key }}"
                                                {{ $key === old('city') ? 'selected' : '' }}>
                                                {{ $city }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Academic Degree -->
                            <div class="form-group row">
                                <label for="academic_degree"
                                       class="col-md-4 col-form-label text-md-right">@lang('Academic Degree')</label>

                                <div class="col-md-6">
                                    <select id="academic_degree" name="academic_degree"
                                            class="form-control form-select{{ $errors->has('academic_degree') ? ' is-invalid' : '' }}"
                                            required>
                                        <option disabled selected>- اختر -</option>
                                        @foreach($academicDegrees as $key => $degree)
                                            <option
                                                value="{{ $key }}"
                                                {{ $key === old('academic_degree') ? 'selected' : '' }}>
                                                {{ $degree }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('academic_degree'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('academic_degree') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- occupation -->
                            <div class="form-group row">
                                <label for="occupation"
                                       class="col-md-4 col-form-label text-md-right">@lang('occupation')</label>

                                <div class="col-md-6">
                                    <select
                                        class="form-control form-select {{ $errors->has('occupation') ? ' is-invalid' : '' }}"
                                        id="occupation"
                                        name="occupation">
                                        <option disabled selected>- اختر -</option>
                                        @foreach($occupations as $key => $occupation)
                                            <option
                                                value="{{ $key }}"
                                                {{ $key === old('occupation') ? 'selected' : '' }}>
                                                {{ $occupation }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('occupation'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <!-- skills -->
                            <div class="form-group row">
                                <label for="skills"
                                       class="col-md-4 col-form-label text-md-right">@lang('skills')</label>

                                <div class="col-md-6">
                                    @foreach($skills as $key => $skill)
                                        <div class="form-check">
                                            <input title="@lang('Skills')"
                                                   class="form-check-input"
                                                   type="checkbox" name="skills[]"
                                                   id="{{ $key }}" value="{{ $key }}"
                                                {{ in_array($skill, old('skills', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $key }}">
                                                {{ $skill }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- typing speed -->
                            <div class="form-group row">
                                <label for="typing_speed"
                                       class="col-md-4 col-form-label text-md-right">@lang('Typing Speed')</label>

                                <div class="col-md-6">
                                    <select class="form-control form-select required"
                                            id="typing_speed"
                                            name="typing_speed">
                                        <option disabled selected>- اختر -</option>
                                        @foreach($typingSpeeds as $key => $speed)
                                            <option
                                                value="{{ $key }}"
                                                {{ $key === old('typing_speed') ? 'selected' : '' }}>
                                                {{ $speed }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Preferred Times -->
                            <div class="form-group row">
                                <label for="preferred_times"
                                       class="col-md-4 col-form-label text-md-right">@lang('Preferred Times')</label>

                                <div class="col-md-6">

                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox" name="preferred_times[]"
                                               {{ in_array('morning', old('preferred_times', [])) ? 'checked' : '' }}
                                               id="preferred_times-morning" value="morning">
                                        <label class="form-check-label" for="preferred_times-morning">
                                            @lang('Morning shift')
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox" name="preferred_times[]"
                                               {{ in_array('evening', old('preferred_times', [])) ? 'checked' : '' }}
                                               id="preferred_times-evening" value="evening">
                                        <label class="form-check-label" for="preferred_times-evening">
                                            @lang('Evening shift')
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <!-- Twitter  -->
                            <div class="form-group row">
                                <label for="twitter"
                                       class="col-md-4 col-form-label text-md-right">@lang('Twitter')</label>

                                <div class="col-md-6">
                                    <input id="twitter" type="text"
                                           class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
                                           name="twitter" value="{{ old('twitter') }}" required>

                                    @if ($errors->has('twitter'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('twitter') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- instagram -->
                            <div class="form-group row">
                                <label for="instagram"
                                       class="col-md-4 col-form-label text-md-right">@lang('Instagram')</label>

                                <div class="col-md-6">
                                    <input id="instagram" type="text"
                                           class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                                           name="instagram" value="{{ old('instagram') }}">

                                    @if ($errors->has('instagram'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('instagram') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Experiences  -->
                            <div class="form-group row">
                                <label for="experiences"
                                       class="col-md-4 col-form-label text-md-right">@lang('Experiences')</label>

                                <div class="col-md-6">
                                    <input id="experiences" type="text"
                                           class="form-control{{ $errors->has('experiences') ? ' is-invalid' : '' }}"
                                           name="experiences" value="{{ old('experiences') }}">

                                    @if ($errors->has('experiences'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('experiences') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Languages -->
                            <div class="form-group row">
                                <label for="languages"
                                       class="col-md-4 col-form-label text-md-right">@lang('Languages')</label>

                                <div class="col-md-6">
                                    @foreach($languagesList as $key => $language)
                                        <div class="form-check">
                                            <input title="@lang('languages')"
                                                   class="form-check-input {{ $errors->has('languages') ? ' is-invalid' : '' }}"
                                                   type="checkbox" name="languages[]"
                                                   id="{{ $key }}" value="{{ $key }}"
                                                {{ in_array($language, old('languages', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{ $key }}">
                                                {{ $language }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

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
