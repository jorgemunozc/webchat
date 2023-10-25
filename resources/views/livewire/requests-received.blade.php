<div class="w-full bg-gray-50 max-w-md">
    @foreach ($this->requests as $request)
    <livewire:friend-request-item type="received" :friend-request="$request" />
    @endforeach
</div>