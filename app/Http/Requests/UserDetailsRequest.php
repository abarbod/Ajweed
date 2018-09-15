<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // User fields validation.
            'first_name'       => ['required', 'string', 'max:255'],
            'father_name'      => ['required', 'string', 'max:255'],
            'grandfather_name' => ['required', 'string', 'max:255'],
            'last_name'        => ['required', 'string', 'max:255'],

            // Profile fields validations
            'birth_date'       => ['required', 'before_or_equal:13 years ago'],
            'gender'           => ['required', 'in:male,female'],
            'city'             => ['required', 'string', 'max:100'],
            'academic_degree'  => ['required', 'string', 'max:100'],
            'occupation'       => ['required', 'string', 'max:100'],
            'preferred_times'  => ['required', 'array'],
            'languages'        => ['required', 'array'],
            'typing_speed'     => ['nullable', 'string', 'max:100'],
            'skills'           => ['nullable', 'array'],
            'experiences'      => ['nullable', 'string', 'max:500'],
            'twitter'          => ['nullable', 'string', 'max:100'],
            'instagram'        => ['nullable', 'string', 'max:100'],
        ];
    }
}
