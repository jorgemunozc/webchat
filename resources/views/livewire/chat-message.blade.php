<div class="border max-w-sm relative p-2
    {{$this->isOwnMessage? 'bg-green-200': 'bg-yellow-200 self-end'}}">
    <div>
        {{$message->content}}
    </div>
    <small class="text-right w-full block text-xs">{{$date->toDayDateTimeString()}}</small>
</div>