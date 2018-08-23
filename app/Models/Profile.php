<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int     $id
 * @property User    $user
 * @property string  $gender
 * @property Carbon  $birth_date
 * @property boolean $is_public
 */
class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender',
        'birth_date',
        'is_public',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_public' => 'boolean',
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
