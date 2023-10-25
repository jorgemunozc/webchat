<div>
    @foreach ($this->requests as $friendRequest)
    <livewire:friend-request-item type="sent" :friend-request="$friendRequest" wire:key="{{$friendRequest->id}}" >
        @endforeach
</div>