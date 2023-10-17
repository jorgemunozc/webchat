<?php

namespace App\Livewire;

use App\Models\Chat;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Friends extends Component
{
    /** @return Collection<int, \App\Models\User> */
    #[Computed]
    public function friends(): Collection
    {
        return Auth::user()?->friends();
    }

    public function chat(int $friendId): void
    {
        $chat = Chat::where(fn (Builder $query) => $query->where('userA_id', $friendId)
            ->where('userB_id', Auth::user()?->id)
        )
            ->orWhere(fn (Builder $query) => $query->where('userA_id', Auth::user()?->id)
                ->where('userB_id', $friendId)
            )
            ->first();
        if (is_null($chat)) {
            $chat = Chat::create([
                'userA_id' => Auth::user()?->id,
                'userB_id' => $friendId,
            ]);
        }

        $this->redirect("/chat/{$chat->id}");
    }

    public function render(): View
    {
        return view('livewire.friends');
    }
}
