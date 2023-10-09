<div>
    <div>
        <p>Receptor: {{ $receiverId }}</p>
        <p>Emisor: {{ $senderId }}</p>
    </div>
    <ul>
        @foreach ($messages as $message)
        <livewire:chat-message :message="$message" wire:key='{{$message->id}}'>
            @endforeach
    </ul>
    <livewire:create-chat-message :chatId="$chat->id" :senderId="$senderId" />
</div>