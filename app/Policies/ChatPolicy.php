<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Chat;
use App\Models\User;

class ChatPolicy
{
    public function view(User $user, Chat $chat): bool
    {
        return $chat->userA_id === $user->id || $chat->userB_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }
}
