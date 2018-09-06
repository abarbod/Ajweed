<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;

/**
 * @property int                                                      $id
 * @property string                                                   $username
 * @property string                                                   $first_name
 * @property string                                                   $second_name
 * @property string                                                   $third_name
 * @property string                                                   $last_name
 * @property string                                                   $email
 * @property string                                                   $password
 * @property string                                                   $official_id
 * @property string                                                   $avatar
 * @property string                                                   $mobile
 * @property Profile                                                  $profile
 * @property \Illuminate\Support\Collection|\App\Models\Event[]       $pendingEvents
 * @property \Illuminate\Support\Collection|\App\Models\Application[] $applications
 */
class User extends Authenticatable implements MustVerifyEmailContract
{
    use Notifiable, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'father_name',
        'grandfather_name',
        'last_name',
        'email',
        'password',
        'official_id',
        'mobile',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relationship: A user has one profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Relationship: A user can have many pending events.
     * These events will be associated with the user using the Application model.
     * When a user applies to an event we create an Application to hold the status and decision of the application.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pendingEvents()
    {
        return $this->belongsToMany(Event::class, 'applications')
                    ->using(Application::class)
                    ->as('application')
                    ->withTimestamps()
                    ->withPivot(['status']);
    }

    /**
     * Relationship: A user can have many applications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Whether the user has a complete his profile or not.
     *
     * @return bool
     */
    public function hasCompleteProfile()
    {
        return optional($this->profile)->isComplete();
    }


    /**
     * The user avatar
     *
     * @param int $size , in pixels, of the image returned by gravatar (anywhere from 1px up to 2048px).
     *
     * @link https://en.gravatar.com/site/implement/images/
     *
     * @return string
     */
    public function avatar($size = 45)
    {
        if (Storage::disk('public')->exists($this->avatar)) {
            return Storage::disk('public')->url($this->avatar);
        };

        return sprintf('https://www.gravatar.com/avatar/%s?d=%s&s=%s',
            md5(strtolower(trim($this->email))),
            'mm',
            $size
        );
    }

    /**
     * Whether this user as an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->email === 'admin@example.com';
    }


}
