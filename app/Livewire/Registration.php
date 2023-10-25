<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Registration extends Component
{
    #[Rule('required|unique:users')]
    public string $username = '';

    #[Rule('required')]
    public string $visibleName = '';

    #[Rule('required')]
    public string $password = '';

    #[Rule('required|same:password')]
    public string $passwordConfirmation = '';

    #[Rule('required')]
    public string $email = '';

    public function mount(): void
    {
        if (old()) {
            $this->fill(old());
        }
    }

    public function render(): View
    {
        return view('livewire.registration');
    }

    public function register(): void
    {
        $this->validate();
        $newUser = new User();
        $newUser->username = $this->username;
        $newUser->visible_name = $this->visibleName;
        $newUser->password = $this->password;
        $newUser->email = $this->email;
        try {
            $newUser->save();
            $this->redirect(Login::class);
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('error', $e->getMessage());
            $this->redirect(Registration::class);
        }
    }
}
