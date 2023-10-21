<div class="bg-yellow-200 p-2">
    <input type="text" wire:model.live.debounce.250ms="search" placeholder="Search people...">
    <div class="bg-red-500">
        friends
        {{var_dump($friends)}}
    </div>
    @isset ($this->results)
    <ul>
        @foreach ($this->results as $result)
        <li>
            {{$result->visible_name}}
            @unless($result->hasPendingFriendRequestWithUser(Auth::user()->id))
            <button class="bg-green-500" wire:click="sendFriendRequest({{$result->id}})">Send friend request</button>
            @endunless
        </li>
        @endforeach
        @if($this->results->isEmpty())
        <li>No results.</li>
        @endif
    </ul>
    @endisset
</div>