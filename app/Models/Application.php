<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property int $event_id
 * @property string $status of the application. Possible values: processing, on-hold, accepted, rejected.
 * @property \App\Models\User $user owning the application.
 * @property \App\Models\Event $event associated with the application.
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Application extends Pivot
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'applications';

    /**
     * Relationship: An application belongs to an event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Relationship: An application belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * When a user withdraw his application to an event, we mark the applications's status as withdrawn.
     */
    public function withdraw()
    {
        return $this->update(['status' => 'withdrawn']);
    }

}
