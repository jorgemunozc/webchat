<div class="border">
    {{-- <div>
        <p>Chat: {{ $chatId }}</p>
    </div> --}}
    <input type="text" id="message" wire:model="message" class="bg-gray-100">
    <button wire:click="save" class="bg-blue-400 text-white w-32">Send</button>
    <div >Message: {{ $message }}</div>
</div>