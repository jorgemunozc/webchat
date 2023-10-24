<main class="w-full flex flex-1 flex-col overflow-hidden">
    <div class="h-12 flex-none px-2 text-right text-xl font-semibold text-gray-600 bg-emerald-100">
        {{$receiver->visible_name}}
    </div>
    <ul class="grow flex flex-col gap-8 overflow-auto px-2 py-2">
        @foreach ($this->messages as $message)
        <livewire:chat-message :message="$message" wire:key="{{$message->id}}">
            @endforeach
    </ul>
    <livewire:create-chat-message :chatId="$chat->id" :senderId="$senderId" />
</main>