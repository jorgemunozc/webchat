<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\View\View;
use Livewire\Component;

class ChatMessage extends Component
{
    public Message $message;

    public function render(): View
    {
        return view('livewire.chat-message');
    }
}
