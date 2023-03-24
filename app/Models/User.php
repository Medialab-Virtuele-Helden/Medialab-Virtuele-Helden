<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the challenges created by the user.
     */
    public function challenges(): HasMany
    {
        return $this->hasMany(Challenge::class, 'organisor');
    }

    /**
     * Get all the posts written by the user.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author');
    }

    /**
     * Get the comments that the user has created.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author');
    }

    /**
     * Get the likes that the user has given to posts/comments.
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function participated_challenges(): HasManyThrough
    {
        return $this->hasManyThrough(Challenge::class, Participant::class);
    }
}
