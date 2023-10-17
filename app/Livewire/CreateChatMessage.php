<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\View\View;
use Livewire\Component;

class CreateChatMessage extends Component
{
    public string $message = '';

    public int $chatId = 0;

    public int $senderId = 0;

    public function save(): void
    {
        $this->authorize('create', [Message::class, $this->chatId]);
        $message = new Message();
        $message->content = $this->message;
        $message->chat_id = $this->chatId;
        $message->sender_id = $this->senderId;
        $message->save();
        $this->reset('message');
        MessageSent::dispatch($message);
    }

    public function render(): View
    {
        return view('livewire.create-chat-message');
    }
}
