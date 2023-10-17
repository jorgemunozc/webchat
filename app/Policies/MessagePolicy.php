<?php

namespace App\Policies;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Builder;

class MessagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Message $message): Response
    {
        return $user->id === $message->sender_id
        ? Response::allow()
        : Response::deny('No tiene acceso a este char :(');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, int $chatId): bool
    {
        return Chat::where('id', $chatId)
            ->where(fn (Builder $query) => $query->where('userA_id', $user->id)
                ->orWhere('userB_id', $user->id))->exists();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Message $message): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Message $message): bool
    {
        return false;
    }
}
