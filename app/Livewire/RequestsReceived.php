<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class RequestsReceived extends Component
{
    /** @return Collection<int,\App\Models\FriendRequest> **/
    #[Computed]
    public function requests(): ?Collection
    {
        return Auth::user()?->friendRequestsReceived->load('sender');
    }

   

    public function render(): View
    {
        return view('livewire.requests-received');
    }
}
