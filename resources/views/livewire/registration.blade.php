<main class="h-screen grid place-items-center">
    @if (session('error'))
    <div class="bg-red-100">
        {{ session('error') }}
    </div>
    @endif
    <form wire:submit='register' class="bg-gray-100 w-full max-w-xl mx-auto pb-4">
        <h2 class="bg-emerald-700 h-12 grid place-items-center font-bold text-2xl text-white w-full">Registration</h2>
        <div class="flex flex-col gap-3 px-12 pt-2">
            <x-input name="username" label="Username" wire:model="username" />
            <x-input type="text" name="email" label="Email" wire:model="email" />
            <x-input type="text" name="visibleName" label="Visible Name" wire:model="visibleName" />
            <x-input type="password" name="password" label="Password" wire:model="password" />
            <x-input type="password" name="passwordConfirmation" label="Password Confirmation" wire:model="passwordConfirmation" />
            <button type="submit"
                class="h-16 bg-emerald-500 w-full hover:bg-emerald-700 font-semibold">REGISTER</button>
        </div>
    </form>
</main>