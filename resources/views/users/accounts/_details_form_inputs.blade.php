<?php

use App\Models\{Profile, User};

// To populate the form with the user data if we have any.
// if this is included in the create account form,
// we create a new user to avoid checking values.
$user = auth()->user() ?? new User();
$profile = $user->profile ?? new Profile();

/** @var array $citiesList list of cities to use in the select city field. Key will be the value */
$citiesList = [
    'الرياض'          => 'الرياض',
    'جدة'             => 'جدة',
    'مكة'             => 'مكة',
    'المدينة المنورة' => 'المدينة المنورة',
    'تبوك'            => 'تبوك',
    'الدمام'          => 'الدمام',
    'الأحساء'         => 'الأحساء',
    'القطيف'          => 'القطيف',
    'خميس مشيط'       => 'خميس مشيط',
    'المظيلف'         => 'المظيلف',
    'الهفوف'          => 'الهفوف',
    'المبرز'          => 'المبرز',
    'الطائف'          => 'الطائف',
    'نجران'           => 'نجران',
    'حفر الباطن'      => 'حفر الباطن',
    'الجبيل'          => 'الجبيل',
    'ضباء'            => 'ضباء',
    'الخرج'           => 'الخرج',
    'الثقبة'          => 'الثقبة',
    'ينبع البحر'      => 'ينبع البحر',
    'الخبر'           => 'الخبر',
    'عرعر'            => 'عرعر',
    'الحوية'          => 'الحوية',
    'عنيزة'           => 'عنيزة',
    'سكاكا'           => 'سكاكا',
    'جيزان'           => 'جيزان',
    'القريات'         => 'القريات',
    'الظهران'         => 'الظهران',
    'الزلفي'          => 'الزلفي',
    'الباحة'          => 'الباحة',
    'الرس'            => 'الرس',
    'وادي الدواسر'    => 'وادي الدواسر',
    'بيشة'            => 'بيشة',
    'سيهات'           => 'سيهات',
    'شرورة'           => 'شرورة',
    'الدوادمي'        => 'الدوادمي',
    'الأفلاج'         => 'الأفلاج',
    'أبها'            => 'أبها',
    'الجوف'           => 'الجوف',
    'الحدود الشمالية' => 'الحدود الشمالية',
    'القصيم'          => 'القصيم',
    'جازان'           => 'جازان',
    'جده'             => 'جده',
    'حائل'            => 'حائل',
    'مكة المكرمة'     => 'مكة المكرمة',
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
<!-- First Name -->
<div class="form-group row">
    <label for="first_name"
           class="col-md-4 col-form-label text-md-right required">@lang('First Name')</label>

    <div class="col-md-6">
        <input id="first_name" type="text"
               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
               name="first_name" value="{{ old('first_name', $user->first_name) }}" required>

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
           class="col-md-4 col-form-label text-md-right required">@lang('Father Name')</label>

    <div class="col-md-6">
        <input id="father_name" type="text"
               class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}"
               name="father_name" value="{{ old('father_name', $user->father_name) }}" required>

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
           class="col-md-4 col-form-label text-md-right required">@lang('Grandfather Name')</label>

    <div class="col-md-6">
        <input id="grandfather_name" type="text"
               class="form-control{{ $errors->has('grandfather_name') ? ' is-invalid' : '' }}"
               name="grandfather_name" value="{{ old('grandfather_name', $user->grandfather_name) }}" required>

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
           class="col-md-4 col-form-label text-md-right required">@lang('Last Name')</label>

    <div class="col-md-6">
        <input id="last_name" type="text"
               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
               name="last_name" value="{{ old('last_name', $user->last_name) }}" required>

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
           class="col-md-4 col-form-label text-md-right required">@lang('Gender')</label>

    <div class="col-md-6">
        <div class="form-check">
            <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                   type="radio" name="gender" required
                   {{ old('gender', $profile->gender) === 'male' ? 'checked': '' }}
                   id="maleRadio" value="male">
            <label class="form-check-label" for="maleRadio">
                @lang('Male')
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                   type="radio" name="gender" required
                   {{ old('gender', $profile->gender) === 'female' ? 'checked': '' }}
                   id="femaleRadio" value="female">
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

<!-- Birth Date -->
<div class="form-group row">
    <label for="birth_date"
           class="col-md-4 col-form-label text-md-right required">@lang('Birth Date')</label>

    <div class="col-md-6">
        <input id="birth_date" type="date" required
               class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}"
               max="{{ (new \DateTime('-13 years'))->format('Y-m-d') }}"
               name="birth_date" value="{{ old('birth_date', optional($profile->birth_date)->format('Y-m-d')) }}">

        @if ($errors->has('birth_date'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('birth_date') }}</strong>
                            </span>
        @endif
    </div>
</div>

<!-- City -->
<div class="form-group row">
    <label for="city" class="col-md-4 col-form-label text-md-right required">@lang('City')</label>

    <div class="col-md-6">
        <select
            class="form-control form-select required {{ $errors->has('city') ? ' is-invalid' : '' }}"
            id="city" name="city" required>
            <option selected disabled>- اختر -</option>
            @foreach(array_sort($citiesList) as $key => $city)
                <option
                    value="{{ $key }}"
                    {{ $key === old('city', $profile->city) ? 'selected' : '' }}>
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
           class="col-md-4 col-form-label text-md-right required">@lang('Academic Degree')</label>

    <div class="col-md-6">
        <select id="academic_degree" name="academic_degree"
                class="form-control form-select{{ $errors->has('academic_degree') ? ' is-invalid' : '' }}"
                required>
            <option disabled selected>- اختر -</option>
            @foreach($academicDegrees as $key => $degree)
                <option
                    value="{{ $key }}"
                    {{ $key === old('academic_degree', $profile->academic_degree) ? 'selected' : '' }}>
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
           class="col-md-4 col-form-label text-md-right required">@lang('occupation')</label>

    <div class="col-md-6">
        <select
            class="form-control form-select {{ $errors->has('occupation') ? ' is-invalid' : '' }}"
            id="occupation"
            name="occupation" required>
            <option disabled selected>- اختر -</option>
            @foreach($occupations as $key => $occupation)
                <option
                    value="{{ $key }}"
                    {{ $key === old('occupation', $profile->occupation) ? 'selected' : '' }}>
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

<!-- Preferred Times -->
<div class="form-group row">
    <label for="preferred_times"
           class="col-md-4 col-form-label text-md-right required">@lang('Preferred Times')</label>

    <div class="col-md-6">
        @if ($errors->has('preferred_times'))
            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('preferred_times') }}</strong>
                                        </span>
        @endif
        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox" name="preferred_times[]"
                   {{ in_array('morning', old('preferred_times', explode(',', $profile->preferred_times))) ? 'checked' : '' }}
                   id="preferred_times-morning" value="morning">
            <label class="form-check-label" for="preferred_times-morning">
                @lang('Morning shift')
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox" name="preferred_times[]"
                   {{ in_array('evening', old('preferred_times', explode(',', $profile->preferred_times))) ? 'checked' : '' }}
                   id="preferred_times-evening" value="evening">
            <label class="form-check-label" for="preferred_times-evening">
                @lang('Evening shift')
            </label>
        </div>

    </div>
</div>

<!-- skills -->
<div class="form-group row">
    <label for="skills"
           class="col-md-4 col-form-label text-md-right">@lang('skills')</label>

    <div class="col-md-6">
        @if ($errors->has('skills'))
            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('skills') }}</strong>
                                        </span>
        @endif
        @foreach($skills as $key => $skill)
            <div class="form-check">
                <input title="@lang('Skills')"
                       class="form-check-input"
                       type="checkbox" name="skills[]"
                       id="{{ $key }}" value="{{ $key }}"
                    {{ in_array($key, old('skills', explode(',', $profile->skills))) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $key }}">{{ $skill }}</label>
            </div>
        @endforeach
    </div>
</div>

<!-- typing speed -->
<div class="form-group row">
    <label for="typing_speed"
           class="col-md-4 col-form-label text-md-right">@lang('Typing Speed')</label>

    <div class="col-md-6">
        <select class="form-control form-select"
                id="typing_speed"
                name="typing_speed">
            <option disabled selected>- اختر -</option>
            @foreach($typingSpeeds as $key => $speed)
                <option
                    value="{{ $key }}"
                    {{ $key === old('typing_speed', $profile->typing_speed) ? 'selected' : '' }}>
                    {{ $speed }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<!-- Twitter  -->
<div class="form-group row">
    <label for="twitter"
           class="col-md-4 col-form-label text-md-right">@lang('Twitter')</label>

    <div class="col-md-6">
        <input id="twitter" type="text"
               class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}"
               name="twitter" value="{{ old('twitter', $profile->twitter) }}">

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
               name="instagram" value="{{ old('instagram', $profile->instagram) }}">

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
               name="experiences" value="{{ old('experiences', $profile->experiences) }}">

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
           class="col-md-4 col-form-label text-md-right required">@lang('Languages')</label>

    <div class="col-md-6">
        @if ($errors->has('languages'))
            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('languages') }}</strong>
                                        </span>
        @endif
        @foreach($languagesList as $key => $language)
            <div class="form-check">
                <input title="@lang('languages')"
                       type="checkbox" name="languages[]"
                       id="{{ $key }}" value="{{ $key }}"
                    {{ in_array($language, old('languages', explode(',', $profile->languages))) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $key }}">
                    {{ $language }}
                </label>
            </div>
        @endforeach
    </div>
</div>
