<header class="h-12 flex-none flex items-center justify-between bg-purple-600 px-2">
    <div class=" font-bold text-lg">
        <a href="/">{{auth()->user()->visible_name}}</a>

    </div>
    <nav>
        <ul class="flex gap-x-2">
            <li class="hover:border-opacity-100 border-black border-b-2 border-opacity-0"><a href="/friends">Friends</a>
            </li>
            {{-- <li class="group px-2 relative hover:border-opacity-100 border-black border-b-2 border-opacity-0">
                Requests
                <ul class="absolute inset--0 m-1 invisible bg-purple-600 group-hover:visible">
                    <li class=""><a href="requests/received">Received</a></li>
                    <li><a href="requests/sent">Sent</a></li>
                </ul>
            </li> --}}
            <li class="hover:border-opacity-100 border-black border-b-2 border-opacity-0"><a href="/requests/received">Requests Received</a></li>
            <li class="hover:border-opacity-100 border-black border-b-2 border-opacity-0"><a href="/requests/sent">Requests Sent</a></li>

        </ul>
    </nav>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor"
        class="w-6 h-6 text-white cursor-pointer" wire:click="logout">
        <path strokeLinecap="round" strokeLinejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
    </svg>
</header>