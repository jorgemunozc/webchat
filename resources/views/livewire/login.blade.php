<main class="h-screen grid place-items-center">
    <form wire:submit="login" class="bg-gray-100 w-full max-w-xl mx-auto h-[30rem] grid">
        <div class="bg-emerald-700 h-12 grid place-items-center font-bold text-2xl text-white">
            <h1>LOGIN</h1>
        </div>
        <div class="px-12 flex flex-col gap-3">
            <div class="flex flex-col">
                <label for="username" class="text-gray-500 font-semibold">Username</label>
                <input type="text" wire:model="username"
                    class="h-12 border outline-none px-2 focus:border-1 focus:border-blue-900">
            </div>
            <div class="flex flex-col">
                <label for="password" class="text-gray-500 font-semibold">Password</label>
                <input type="password" name="password" id="password" wire:model="password"
                    class="h-12 border outline-none px-2 focus:border-1 focus:border-blue-900">
            </div>
            <button type="submit" class="h-16 bg-emerald-500 w-full hover:bg-emerald-700 font-semibold">LOG IN</button>
        </div>
    </form>
    @if (session('error'))
    <div>{{session('error')}}</div>
    @endif
</main>