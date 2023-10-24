<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class RequestsSent extends Component
{
    /** @return Collection<int,\App\Models\FriendRequest> **/
    #[Computed]
    public function requests(): ?Collection
    {
        return Auth::user()?->friendRequestsSent->load('receiver');
    }

    #[On('request-processed')]
    public function remove(): void
    {
        // unset($this->requests);
    }

    public function render(): View
    {
        return view('livewire.requests-sent');
    }
}
