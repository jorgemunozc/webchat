<div>
    <div>
        <p>Receptor: {{ $receiverId }}</p>
        <p>Emisor: {{ $senderId }}</p>
        <p>Total messages: {{$this->messages->count()}}</p>
    </div>
    @if($newMessageReceived)
    <div class="bg-red-100">Message received!!</div>
    @endif
    <ul>
        @foreach ($this->messages as $message)
        <livewire:chat-message :message="$message" wire:key="{{$message->id}}">
            @endforeach
    </ul>
    <livewire:create-chat-message :chatId=" $chat->id" :senderId="$senderId" />
</div>