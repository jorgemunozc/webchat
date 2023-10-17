<div>
    @foreach ($this->friends as $friend)
    <p>id: {{$friend->id}} - {{$friend->username}}</p>
    <button wire:click="chat({{$friend->id}})">Chatear</button>
    @endforeach
</div>