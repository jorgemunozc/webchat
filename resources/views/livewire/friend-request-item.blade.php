<div class="bg-gray-200">
    <div>{{$friendRequest->receiver->visible_name}}</div>
    <button class="bg-green-400" wire:click="accept">Accept</button>
    <button class="bg-red-500" wire:click="deny">Decline</button>
</div>