<div>
    @foreach ($this->requests as $request)
    <div>{{$request->sender->visible_name}}</div>
    <button class="bg-green-400" wire:click="accept({{$request->id}})">Accept</button>
    <button class="bg-red-500" wire:click="decline({{$request->id}})">Decline</button>
    @endforeach
</div>