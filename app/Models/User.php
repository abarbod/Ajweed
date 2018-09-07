<?php

namespace App\Models;

use App\Models\Contracts\MustVerifyMobile as MustVerifyMobileContract;
use App\Models\Traits\HasAvatar;
use App\Models\Traits\MustVerifyMobile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $full_name concatenated name.
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $father_name
 * @property string $grandfather_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $official_id
 * @property \Carbon\Carbon $email_verified_at
 * @property \Carbon\Carbon $mobile_verified_at
 * @property string $mobile
 * @property Profile $profile
 * @property \Illuminate\Support\Collection|\App\Models\Event[] $pendingEvents
 * @property \Illuminate\Support\Collection|\App\Models\Application[] $applications
 */
class User extends Authenticatable implements MustVerifyMobileContract
{
    use Notifiable, MustVerifyMobile, HasAvatar;

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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name',
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
     * Route notifications for the MobilyWs channel.
     * Mobile numbers are stored as "05xxxxxxxx", we need to change it to "9665xxxxxxxx"
     *
     * @return string
     */
    public function routeNotificationForMobilyWs()
    {
        return "966" . ltrim($this->mobile, '0');
    }


    /**
     * Get the user's full name.
     * Attribute accessors can be used like: $user->full_name.
     *
     * @return string concatenated full name
     */
    public function getFullNameAttribute()
    {
        return sprintf('%1$s %2$s %3$s %4$s',
            $this->first_name,
            $this->father_name,
            $this->grandfather_name,
            $this->last_name
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
