<main>
    <form wire:submit="login">
        <div>
            <label for="username">Username</label>
            <input type="text" wire:model="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" wire:model="password">
        </div>
        <button type="submit">Login</button>
    </form>
</main>