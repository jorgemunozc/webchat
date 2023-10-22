<main class="m-2">
    <livewire:search-bar />
    <ul class="max-w-lg my-2">
        <h1 class="h-12 bg-emerald-700 text-white text-xl px-2 flex items-center">My friends</h1>
        @foreach ($this->friends as $friend)
        <li class="h-16 bg-gray-50 hover:bg-gray-100 cursor-pointer grid place-items-center" wire:click="chat({{$friend->id}})">
            <p class="text-xl">{{$friend->visible_name}}</p>
        </li>
        @endforeach
    </ul>
</main>