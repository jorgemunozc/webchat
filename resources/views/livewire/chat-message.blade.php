<div class="border max-w-sm relative {{$this->isOwnMessage? 'bg-green-200': 'bg-yellow-200'}}">
    <div>
        {{$message->content}}
    </div>
    <small class="text-right w-full block">{{$date->toDayDateTimeString()}}</small>
</div>