<?php

namespace App\Livewire;

use App\Models\Message;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ChatMessage extends Component
{
    public Message $message;

    public Carbon $date;

    public function mount(): void
    {
        $this->date = Carbon::parse($this->message->created_at);
        $this->date->tz = new CarbonTimeZone('America/Santiago');
    }

    #[Computed]
    public function isOwnMessage(): bool
    {
        $currentUserId = Auth::user()?->id;

        return $currentUserId === $this->message->sender_id;
    }

    public function render(): View
    {
        return view('livewire.chat-message');
    }
}
