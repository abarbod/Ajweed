<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int     $id
 * @property string  $name
 * @property string  $email
 * @property string  $password
 * @property string  $official_id
 * @property string  $mobile
 * @property Profile $profile
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'official_id',
        'mobile',
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
     * Whether the user has a complete his profile or not.
     *
     * @return bool
     */
    public function hasCompleteProfile()
    {
        return optional($this->profile)->isComplete();
    }
}
