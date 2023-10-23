<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SearchBar extends Component
{
    public string $search = '';

    /** @var array<int,int> */
    private array $friends = [];

    public function boot(): void
    {
        $this->friends = Auth::user()?->friends()->map->id->all() ?? [];
    }

    /** @return Collection<int, User> */
    #[Computed]
    public function results(): ?Collection
    {
        if ($this->search === '') {
            return null;
        }

        return User::where('visible_name', 'like', "%$this->search%")->get();
    }

    public function sendFriendRequest(int $friendId): void
    {
        $currUser = Auth::user();
        if ($currUser &&
            $currUser->hasPendingFriendRequestWithUser($friendId)) {
            return;
        }
        $currUser?->friendRequestsSent()->create(['target_id' => $friendId]);
    }

    public function render(): View
    {
        return view('livewire.search-bar',
            ['friends' => $this->friends]);
    }
}
