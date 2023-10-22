<main class="w-full h-screen flex flex-col px-2">
    <div class="h-10 px-2 text-right text-xl font-semibold text-gray-600 bg-emerald-100">
        {{$receiver->visible_name}}
    </div>
    @if($newMessageReceived)
    <div class="bg-red-100">Message received!!</div>
    @endif
    <ul class="flex flex-col flex-1 gap-8 overflow-auto px-2">
        @foreach ($this->messages as $message)
        <livewire:chat-message :message="$message" wire:key="{{$message->id}}">
            @endforeach
    </ul>
    <livewire:create-chat-message :chatId="$chat->id" :senderId="$senderId" />
</main>