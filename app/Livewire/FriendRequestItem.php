<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class FriendRequestItem extends Component
{
    public FriendRequest $friendRequest;

    /** @var 'sent'|'received' */
    public string $type;

    private string $eventName = 'request-processed';

    public function accept(): void
    {
        $this->authorize('accept', $this->friendRequest);
        $currentUser = Auth::user();
        $userToBefriendId = $currentUser?->id === $this->friendRequest->sender_id ? $this->friendRequest->target_id : $this->friendRequest->sender_id;
        $currentUser?->befriend($userToBefriendId);
        $this->friendRequest->delete();
        $this->dispatch($this->eventName);
    }

    public function deny(): void
    {
        $this->authorize('delete', $this->friendRequest);
        $this->friendRequest->delete();
        $this->dispatch($this->eventName);
    }

    public function render(): View
    {
        return view('livewire.friend-request-item');
    }
}
