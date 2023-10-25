<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\FriendRequest;
use App\Models\User;

class FriendRequestPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FriendRequest $friendRequest): bool
    {
        return $user->id == $friendRequest->sender_id || $user->id === $friendRequest->target_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FriendRequest $friendRequest): bool
    {
        return $user->id === $friendRequest->sender_id || $user->id === $friendRequest->target_id;
    }

    public function accept(User $user, FriendRequest $friendRequest): bool
    {
        return $user->id === $friendRequest->target_id;
    }
}
