<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'organiser', 'status', 'content', 'start_date', 'end_date', 'challenge_goal', 'reward'];

    // status = 0 -> future
    // status = 1 -> running
    // status = 2 -> past

    /**
     * Get the user that created the challenge.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The users that participated in a challenge.
     */
    public function participants(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, Participant::class);
    }
}