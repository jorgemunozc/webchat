<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required')]
    public string $username = '';

    #[Rule('required')]
    public string $password = '';

    public function login(): void
    {
        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];
        if (Auth::attempt($credentials)) {
            session()->regenerate();

            $this->redirect('/friends');
        } else {
            session()->flash('error', 'Invalid credentials.');
            $this->redirect('/login');
        }

    }

    public function render(): View
    {
        return view('livewire.login');
    }
}
