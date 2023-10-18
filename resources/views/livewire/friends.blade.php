<div>
    <ul>
        @foreach ($this->friends as $friend)
        <li>
            <p>id: {{$friend->id}} - {{$friend->username}}</p>
            <button wire:click="chat({{$friend->id}})">Chatear</button>
        </li>
        @endforeach
    </ul>
    <livewire:search-bar />
</div>