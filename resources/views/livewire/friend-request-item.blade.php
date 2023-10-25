<div class="bg-gray-200">
    @if ($type === 'received')
    <div>{{$friendRequest->sender->visible_name}}</div>
    <button class="bg-green-400" wire:click="accept">Accept</button>
    @elseif ($type === 'sent')
    <div>{{$friendRequest->receiver->visible_name}}</div>
    @endif
    <button class="bg-red-500" wire:click="deny">Decline</button>

</div>