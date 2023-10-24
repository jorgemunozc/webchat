<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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
    public function friendRequestsReceived(): HasMany
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

    public function hasPendingFriendRequestWithUser(int $userId): bool
    {
        return
        $this->friendRequestsReceived()->where('sender_id','=', $userId)->exists()
        || $this->friendRequestsSent()->where('target_id', $userId)->exists();
    }

    public function isFriendWith(int $userId): bool
    {
        return DB::table('friendships')
            ->where(fn (Builder $query) => $query->where('friend_id', $this->id)->where('user_id', $userId))
            ->orWhere(fn (Builder $query) => $query->where('user_id', $userId)->where('friend_id', $this->id))
            ->exists();
    }

    public function canReceiveFriendRequestFromUser(int $userId): bool
    {
        return ! $this->hasPendingFriendRequestWithUser($userId)
            && ! $this->isFriendWith($userId);
    }

    public function befriend(int $userId): void
    {
        DB::table('friendships')->insert([
            'user_id' => $this->id,
            'friend_id' => $userId,
        ]);
    }
}
