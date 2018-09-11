<?php

namespace App\Models;

use App\Events\UserAppliedToParticipate;
use App\Exceptions\ApplyingForClosedEventException;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon $created_at
 * @property string $name
 * @property string $description
 * @property string $location
 * @property \Illuminate\Support\Carbon $start_at
 * @property \Illuminate\Support\Carbon $end_at
 * @property string $start_time
 * @property string $end_time
 * @property string $rewards
 * @property int $count_male
 * @property int $count_female
 * @property string $registration_status
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $applicants
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Application[] $applications
 * @property \Carbon\Carbon $published_at
 * @property \Carbon\Carbon $updated_at
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'date:Y-m-d',
        'end_at'   => 'date:Y-m-d',
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

    /**
     * Relationship: An event can have many applicants (Users).
     * The link is the pivot table applications represented by an Application Model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function applicants()
    {
        return $this->belongsToMany(User::class, 'applications')
                    ->using(Application::class)
                    ->as('application')
                    ->withTimestamps()
                    ->withPivot(['status']);
    }

    /**
     * Relationship: An event can have many applications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Apply to participate in this event by the given user.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \App\Exceptions\ApplyingForClosedEventException
     */
    public function applyBy(User $user)
    {
        if ($this->registration_status === 'closed') {
            throw new ApplyingForClosedEventException;
        }

        $this->applicants()->sync([$user->id], ['status' => 'processing']);

        event(new UserAppliedToParticipate($user, $this));

        return $this;
    }

}
