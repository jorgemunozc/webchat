<div class="border w-full h-10">
    <form wire:submit="save" class="flex h-full">
        <input type="text" id="message" wire:model="message" 
        placeholder="Send message"
        class="bg-gray-100 flex-1 focus:outline-none px-2">
        {{-- <button type="submit" class="bg-blue-400 text-white w-32">Send</button> --}}
    </form>

</div>