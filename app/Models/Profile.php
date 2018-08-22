<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property User $user
 */
class Profile extends Model
{


    /**
     * Relationship: A profile belong to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
