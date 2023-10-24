<?php

namespace App\Livewire;

use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class FriendRequestItem extends Component
{
    public FriendRequest $friendRequest;
    private string $eventName = 'request-processed';

    public function accept(): void
    {
        $currentUser = Auth::user();
        $userToBefriendId = $currentUser?->id === $this->friendRequest->sender_id ? $this->friendRequest->sender_id : $this->friendRequest->target_id;
        $currentUser?->befriend($userToBefriendId);
        $this->friendRequest->delete();
        $this->dispatch($this->eventName);
    }

    public function deny(): void
    {
        $this->friendRequest->delete();
        $this->dispatch($this->eventName);
    }

    public function render(): View
    {
        return view('livewire.friend-request-item');
    }
}
