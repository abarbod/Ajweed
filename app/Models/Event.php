<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int                        $id
 * @property \Illuminate\Support\Carbon $created_at
 * @property string                     $name
 * @property string                     $description
 * @property string                     $location
 * @property \Illuminate\Support\Carbon $start_at
 * @property \Illuminate\Support\Carbon $end_at
 * @property string                     $start_time
 * @property string                     $end_time
 * @property string                     $rewards
 * @property int                        $count_male
 * @property int                        $count_female
 * @property string                     $registration_status
 * @property \Carbon\Carbon             $published_at
 * @property \Carbon\Carbon             $updated_at
 */
class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'start_at',
        'end_at',
        'start_time',
        'end_time',
        'rewards',
        'count_male',
        'count_female',
        'registration_status',
        'published_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_at',
        'end_at',
        'published_at',
    ];

}
