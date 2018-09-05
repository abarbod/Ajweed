@extends('layouts.app')

@section('content')
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf


                        <!-- Username -->
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- E-mail -->
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

                        <!-- avatar -->
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('avatar') }}</label>

                            <div class="col-md-6">
                                <input type="file" enctype="multipart/form-data" name="avatar" accept="image/*">
                            </div>
                        </div>

                        <!-- First Name -->
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Father Name -->
                        <div class="form-group row">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __('Father Name') }}</label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" name="father_name" value="{{ old('father_name') }}" required autofocus>

                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('father_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Grandfather Name -->
                        <div class="form-group row">
                            <label for="grandfather_name" class="col-md-4 col-form-label text-md-right">{{ __('Grandfather Name') }}</label>

                            <div class="col-md-6">
                                <input id="grandfather_name" type="text" class="form-control{{ $errors->has('grandfather_name') ? ' is-invalid' : '' }}" name="grandfather_name" value="{{ old('grandfather_name') }}" required autofocus>

                                @if ($errors->has('grandfather_name'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('grandfather_name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

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
                                   class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                           type="radio" name="gender"
                                           {{ old('gender') === 'ذكر' ? 'checked': '' }}
                                           id="maleRadio" value="ذكر">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Male') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                           type="radio" name="gender"
                                           {{ old('gender') === 'أنثى' ? 'checked': '' }}
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

                        <!-- Mobile Number -->
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
                                    <strong>@lang('Example:') 05xxxxxxxx</strong>
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

                        <!-- City -->
                        <div class="form-group row">
                            <label for="City" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-select required" id="city" name="city">
                                    <option value="_none">- اختر -</option>
                                    <option value="أبها">أبها</option>
                                    <option value="الباحة">الباحة</option>
                                    <option value="الجوف">الجوف</option>
                                    <option value="الحدود الشمالية">الحدود الشمالية</option>
                                    <option value="الخبر">الخبر</option>
                                    <option value="الدمام">الدمام</option>
                                    <option value="الرياض">الرياض</option>
                                    <option value="القصيم">القصيم</option>
                                    <option value="المدينة المنورة">المدينة المنورة</option>
                                    <option value="تبوك">تبوك</option>
                                    <option value="جازان">جازان</option>
                                    <option value="جده">جده</option>
                                    <option value="حائل">حائل</option>
                                    <option value="مكة المكرمة">مكة المكرمة</option>
                                    <option value="نجران">نجران</option>
                                </select>
                            </div>
                        </div>

                        <!-- qualifications -->
                        <div class="form-group row">
                            <label for="official_id" class="col-md-4 col-form-label text-md-right">{{ __('qualifications') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-select required" id="edit-profile-volunteer-field-city-und" name="profile_volunteer[field_city][und]">
                                    <option value="_none">- اختر -</option>
                                    <option value="28">ثانوي</option>
                                    <option value="31">دبلوم</option>
                                    <option value="26">بكالوريوس</option>
                                    <option value="27">ماجستير</option>
                                    <option value="32">دكتوراة</option>
                                </select>
                            </div>
                        </div>

                        <!-- occupation -->
                        <div class="form-group row">
                            <label for="official_id" class="col-md-4 col-form-label text-md-right">{{ __('occupation') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-select required" id="edit-profile-volunteer-field-city-und" name="profile_volunteer[field_city][und]">
                                    <option value="_none">- اختر -</option>
                                    <option value="28">موظف</option>
                                    <option value="31">طالب</option>
                                    <option value="26">خريج</option>
                                </select>
                            </div>
                        </div>

                        <!-- skills -->
                        <div class="form-group row">
                            <label for="skills"
                                   class="col-md-4 col-form-label text-md-right">{{ __('skills') }}</label>

                            <div class="col-md-6">

                                <?php

                                $skills = [
                                    'Public Relations'       => __('Public Relations'),
                                    'Marketing'       => __('Marketing'),
                                    'editing'       => __('Editing'),
                                    'editing'       => __('Editing'),
                                    'Communication'       => __('Communication'),
                                    'Presentation'       => __('Planning'),
                                    'MS Office'       => __('MS Office'),
                                    'Design'       => __('Design'),
                                    'Graphics'       => __('Graphics'),
                                    'Motion graphics'       => __('Motion graphics'),
                                    'Photographer'       => __('Photographer'),
                                    'Draw'       => __('Draw'),
                                    'video_filming' => __('Video filming'),
                                ];

                                ?>
                                @foreach($skills as $key => $skill)

                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox" name="skills[]"
                                               id="{{ $key }}" value="{{ $skill }}">
                                        <label class="form-check-label" for="skills">
                                            {{ $skill }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- typing speed -->
                        <div class="form-group row">
                            <label for="official_id" class="col-md-4 col-form-label text-md-right">{{ __('typing speed') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-select required" id="edit-profile-volunteer-field-city-und" name="profile_volunteer[field_city][und]">
                                    <option value="_none">- لا شيء -</option>
                                    <option value="31">ممتاز 90 - 100</option>
                                    <option value="26">جيد جداً 80 - 90</option>
                                    <option value="26">جيد 70 - 80</option>
                                    <option value="26">مقبول 60 - 70</option>
                                    <option value="26">غير متمكن</option>
                                </select>
                            </div>
                        </div>

                        <!-- prefered_times -->
                        <div class="form-group row">
                            <label for="prefered_times"
                                   class="col-md-4 col-form-label text-md-right">{{ __('prefered_times') }}</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="prefered_times[]"
                                           id="morningRadio" value="مسائي">
                                    <label class="form-check-label" for="prefered_times">
                                        {{ __('Morning shift') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="prefered_times[]"
                                           id="eveningRadio" value="صباحي">
                                    <label class="form-check-label" for="prefered_times">
                                        {{ __('Evening shift') }}
                                    </label>
                                </div>


                            </div>
                        </div>

                        <!-- Twitter  -->
                        <div class="form-group row">
                            <label for="twitter" class="col-md-4 col-form-label text-md-right">{{ __('twitter id') }}</label>

                            <div class="col-md-6">
                                <input id="twitter" type="text" class="form-control" name="twitter">
                            </div>
                        </div>

                        <!-- instegram -->
                        <div class="form-group row">
                            <label for="instegram" class="col-md-4 col-form-label text-md-right">{{ __('instegram id') }}</label>

                            <div class="col-md-6">
                                <input id="instegram" type="text" class="form-control" name="instegram">

                            </div>
                        </div>

                        <!-- Experiences  -->
                        <div class="form-group row">
                            <label for="experiences" class="col-md-4 col-form-label text-md-right">{{ __('Experiences') }}</label>

                            <div class="col-md-6">
                                <input id="experiences" type="text" class="form-control{{ $errors->has('experiences') ? ' is-invalid' : '' }} form-control-lg" name="experiences" value="{{ old('experiences') }}" required autofocus>
                                @if ($errors->has('experiences'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experiences') }}</strong>
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

                        <!-- Register btn +  Already have an account? -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
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
