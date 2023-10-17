<?php

namespace App\Livewire;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ShowChat extends Component
{
    public Chat $chat;

    public int $receiverId;

    public int $senderId = -1;

    public bool $newMessageReceived = false;

    // /** @var Collection<int, \App\Models\Message> */
    // public Collection $messages;

    public function mount(Chat $chat): void
    {
        $this->authorize('view', $chat);
        $this->$chat = $chat;
        $this->senderId = Auth::user()->id ?? $chat->userA_id;
        $this->receiverId = $chat->userA_id === $this->senderId ? $chat->userB_id : $chat->userA_id;
        // $this->messages = $chat->messages;
    }

    /** @return array<string,string>*/
    public function getListeners(): array
    {
        return [
            "echo-private:chat.{$this->chat->id},MessageSent" => 'loadMessage',
        ];
    }

    public function notify(mixed $event): void
    {
        $this->newMessageReceived = true;
    }

    /** @return Collection<int,\App\Models\Message> */
    #[Computed]
    public function messages(): Collection
    {
        return $this->chat->messages;
    }

    /** @param  array<string,array<string, string>>  $event*/
    public function loadMessage(array $event): void
    {
        unset($this->messages);
    }

    public function render(): View
    {
        return view('livewire.show-chat');
    }
}
