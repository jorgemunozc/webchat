<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\FriendRequestStatus;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'username',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    /** @return BelongsToMany<User> */
    public function friendOf(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id');
    }

    /** @return BelongsToMany<User> */
    public function friendTo(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id');
    }

    /** @return HasMany<FriendRequest> */
    public function friendRequests(): HasMany
    {
        return $this->hasMany(FriendRequest::class, 'target_id');
    }

    /** @return HasMany<FriendRequest> */
    public function friendRequestsSent(): HasMany
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }

    /** @return Collection<int, User> */
    public function friends(): Collection
    {
        return $this->friendOf->merge($this->friendTo);
    }

    public function sendFriendRequest(int $friendId): void
    {
        FriendRequest::create([
            'sender_id' => $this->id,
            'target_id' => $friendId,
        ]);
    }

    public function pendingScope(Builder $query): void
    {
        $query->where('status', FriendRequestStatus::Pending);
    }
}
