<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FriendRequest extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'target_id'];

    /** @return BelongsTo<\App\Models\User,FriendRequest> */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'target_id');
    }

    /** @return BelongsTo<\App\Models\User,FriendRequest> */
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
