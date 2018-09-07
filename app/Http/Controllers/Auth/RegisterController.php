<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use App\Rules\SaudiOfficialId;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;

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
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // User fields validation.
            'username'         => ['required', 'string', 'min:4', 'max:255', 'unique:users'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', 'string', 'min:6'],
            'first_name'       => ['required', 'string', 'max:255'],
            'father_name'      => ['required', 'string', 'max:255'],
            'grandfather_name' => ['required', 'string', 'max:255'],
            'last_name'        => ['required', 'string', 'max:255'],
            'mobile'           => ['required', 'unique:users', 'regex:/^05\d{8}$/'],
            'avatar'           => [
                'nullable',
                'image',
                'dimensions:min_width=300,min_height=300',
                'mimes:jpeg,png,jpg',
            ],
            'official_id'      => [
                'required',
                'digits:10',
                'unique:users',
                new SaudiOfficialId,
            ],

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
        ]);
    }

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
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        /** @var User $user */
        $user = User::create([
            'username'         => $data['username'],
            'first_name'       => $data['first_name'],
            'father_name'      => $data['father_name'],
            'grandfather_name' => $data['grandfather_name'],
            'last_name'        => $data['last_name'],
            'email'            => $data['email'],
            'password'         => Hash::make($data['password']),
            'official_id'      => $data['official_id'],
            'mobile'           => $data['mobile'],
            'avatar'           => $this->storeAvatar($data),
        ]);

        $data['preferred_times'] = implode(',', $data['preferred_times']);
        $data['languages']       = implode(',', $data['languages']);
        // skills filed is optional, we have to check if it exists in the $data array.
        $data['skills'] = isset($data['skills']) ? implode(',', $data['skills']) : null;

        $profile = Profile::query()->make($data);
        $user->profile()->save($profile);

        return $user;
    }

    /**
     * Store the user uploaded avatar on public disk.
     *
     * @param array $data the request inputs.
     *
     * @return string The file pathname to store in database if storing is successful.
     */
    protected function storeAvatar(array $data)
    {
        // Only if the user has uploaded an image using the avatar field.
        if (isset($data['avatar']) && $data['avatar'] instanceof UploadedFile) {

            // If any exception is thrown when storing the file, we return nothing.
            try {
                // Resize and convert the image to jpg string.
                $image = (string)Image::make($data['avatar'])
                                      ->resize(300, 300)
                                      ->encode('jpg');

                // Store the file on disk. Path = storage/app/public/avatars with random file name.
                $fileName = 'avatars/' . time() . '-' . str_random(40) . '.jpg';
                $result   = Storage::disk('public')->put($fileName, $image);

                // We return the file name to store it in database.
                if ($result) {
                    return $fileName;
                }
            } catch (\Exception $exception) {
            }
        }
    }

}
