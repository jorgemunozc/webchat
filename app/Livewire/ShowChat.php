<?php

namespace App\Livewire;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class ShowChat extends Component
{
    public Chat $chat;

    public int $receiverId;

    public int $senderId = -1;

    /** @var Collection<int, \App\Models\Message> */
    public Collection $messages;

    public function mount(Chat $chat): void
    {
        $this->$chat = $chat;
        $this->senderId = Auth::user()->id ?? $chat->userA_id;
        $this->receiverId = $chat->userA_id === $this->senderId ? $chat->userB_id : $chat->userA_id;
        $this->messages = $chat->messages;
    }

    public function render(): View
    {
        return view('livewire.show-chat');
    }
}
