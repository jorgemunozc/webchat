<div class="bg-emerald-500 max-w-sm relative p-2">
    <div class="relative">
        <input class="h-12 px-12 w-full focus:outline-none" type="text" wire:model.live.debounce.250ms="search"
            placeholder="Search people..."
            onlur="document.querySelector('#search-results')?.classList.add('invisible')"
            ofocus="document.querySelector('#search-results')?.classList.remove('invisible')">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="h-6 w-10 absolute inset-y-0 left-0 my-auto">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-12 h-6 absolute inset-y-0 right-0 my-auto" wire:click="$set('search', '')">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>

    </div>
    @isset ($this->results)
    <ul id="search-results" class="absolute inset-x-0 bg-gray-50 p-2 mx-2 max-h-48 overflow-auto flex flex-col gap-3">
        @foreach ($this->results as $result)
        <li class="h-12 flex-none flex justify-between items-start hover:bg-gray-200">
            {{$result->visible_name}}({{$result->id}})
            @if($result->canReceiveFriendRequestFromUser(Auth::user()->id))
            <button class="bg-emerald-800 text-xs text-white p-1 antialiased flex-shrink-0"
                wire:click="sendFriendRequest({{$result->id}})">Send friend request</button>
            @endif
        </li>
        @endforeach
        @if($this->results->isEmpty())
        <li>No results.</li>
        @endif
    </ul>
    @endisset
</div>