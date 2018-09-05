<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property int            $id
 * @property \Carbon\Carbon $birth_date
 * @property string         $gender
 * @property string         $city
 * @property string         $academic_degree
 * @property string         $occupation
 * @property string         $preferred_times
 * @property string         $typing_speed
 * @property string         $languages
 * @property string         $skills
 * @property string         $experiences
 * @property string         $twitter
 * @property string         $instegram
 * @property User           $user
 */
class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'birth_date',
        'gender',
        'city',
        'academic_degree',
        'occupation',
        'preferred_times',
        'typing_speed',
        'languages',
        'skills',
        'experiences',
        'twitter',
        'instegram',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birth_date',
    ];

    /**
     * Relationship: A profile belong to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Is the profile complete? Depending on Ajaweed requirements.
     * Only users with complete profile are allowed to participate in events.
     *
     * @return bool
     */
    public function isComplete()
    {
        return true;
    }
}
