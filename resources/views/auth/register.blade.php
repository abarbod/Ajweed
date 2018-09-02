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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('avatar') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="pic" accept="image/*">
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
                            <label for="official_id" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select class="form-control form-select required" id="edit-profile-volunteer-field-city-und" name="profile_volunteer[field_city][und]">
                                    <option value="_none">- اختر -</option>
                                    <option value="28">أبها</option>
                                    <option value="31">الباحة</option>
                                    <option value="26">الجوف</option>
                                    <option value="27">الحدود الشمالية</option>
                                    <option value="32">الخبر</option>
                                    <option value="22">الدمام</option>
                                    <option value="2">الرياض</option>
                                    <option value="23">القصيم</option>
                                    <option value="34">المدينة المنورة</option>
                                    <option value="25">تبوك</option>
                                    <option value="30">جازان</option>
                                    <option value="21">جده</option>
                                    <option value="24">حائل</option>
                                    <option value="33">مكة المكرمة</option>
                                    <option value="29">نجران</option>
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
                            <label for="gender"
                                   class="col-md-4 col-form-label text-md-right">{{ __('skills') }}</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="maleRadio" value="male">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Public Relations') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="maleRadio" value="male">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Marketing') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="maleRadio" value="male">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Communication') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="gender"
                                           id="maleRadio" value="male">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Presentation') }}
                                    </label>
                                </div>


                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Planning') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('MS Office') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Design') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Graphics') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Motion graphics') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Photographer') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Video filming') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Editing') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Draw') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="femaleRadio" value="female">
                                    <label class="form-check-label" for="femaleRadio">
                                        {{ __('Others') }}
                                    </label>
                                </div>

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
                            <label for="gender"
                                   class="col-md-4 col-form-label text-md-right">{{ __('prefered_times') }}</label>

                            <div class="col-md-6">

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="maleRadio" value="male">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Moiring shift') }}
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox" name="skills"
                                           id="maleRadio" value="male">
                                    <label class="form-check-label" for="maleRadio">
                                        {{ __('Evening shift') }}
                                    </label>
                                </div>


                            </div>
                        </div>

                        <!-- Twitter  -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('twitter id') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="twitter">
                            </div>
                        </div>

                        <!-- instegram -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('instegram id') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="twitter">
                            </div>
                        </div>

                        <!-- Experiences  -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Experiences') }}</label>

                            <div class="col-md-6">
                                <input id="Experiences" type="text" class="form-control form-control-lg" name="Experiences">
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
