<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'official_id' => [
                'required',
                'digits:10',
                'unique:users',
//                function ($attribute, $value, $fail) {
//                    if ( ! in_array($this->check_official_id($value), [1, 2])) {
//                        return $fail(__('The Saudi Id / Iqama Id is not valid.'));
//                    }
//                },

            ],
            'mobile' => 'required|unique:users|regex:/^05\d{8}$/',
            'gender'     => 'required',
            'birth_date' => 'required|date|before:13 years ago',
            'is_public'  => 'boolean',
        ],
            [
                'mobile.regex' => 'Mobile number must be 10 digits and start with 05',
            ]);
    }

    /**
     * After registration, redirect to create a new profile.
     *
     * @return string
     */
//    public function redirectTo()
//    {
//        return route('users.profile.show', compact('user', 'profile'));
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $user = new User();
        $user-> name = $data['name'];
        $user-> email = $data['email'];
        $user-> password =  bcrypt($data['password']);
        $user-> official_id = $data['official_id'];
        $user-> mobile = $data['mobile'];
        $user->save();




        $Profile = new Profile();
        $Profile->user_id = $user->id;
        $Profile->gender = $data['gender'];
        $Profile->birth_date = $data['birth_date'];
        $Profile->is_public = $data['is_public'];
        $Profile->save();
        return $user;



    }
s
    /**
     * After registration, redirect to create a new profile.
     *
     * @return string
     */
    public function redirectTo()
    {
        return route('users.account.index');
    }



    /**
     * Validate a Saudi / Iqama Id.
     *
     * @link https://github.com/alhazmy13/Saudi-ID-Validator
     *
     * @param integer $id_number to validate
     *
     * @return bool|int|string -1 if not valid, 1 for Saudi, 2 for non-saudis
     */
    protected function check_official_id($id_number)
    {
        $id = trim($id_number);
        if ( ! is_numeric($id)) {
            return -1;
        }
        if (strlen($id) !== 10) {
            return -1;
        }
        $type = substr($id, 0, 1);
        if ($type != 2 && $type != 1) {
            return -1;
        }
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($i % 2 == 0) {
                $ZFOdd = str_pad((substr($id, $i, 1) * 2), 2, "0", STR_PAD_LEFT);
                $sum   += substr($ZFOdd, 0, 1) + substr($ZFOdd, 1, 1);
            } else {
                $sum += substr($id, $i, 1);
            }
        }

        return $sum % 10 ? -1 : $type;
    }
}
