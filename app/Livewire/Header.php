<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render(): View
    {
        return view('livewire.header');
    }

    public function shouldRender(): bool
    {
        return Auth::check();
    }

    public function logout(): void
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        redirect('login');
    }
}
