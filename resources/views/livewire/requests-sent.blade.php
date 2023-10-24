<div>
    @foreach ($this->requests as $friendRequest)
    <livewire:friend-request-item :friend-request="$friendRequest" wire:key="{{$friendRequest->id}}" >
        @endforeach
</div>