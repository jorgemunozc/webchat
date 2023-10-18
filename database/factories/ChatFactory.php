<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();
        DB::table('friendships')->insert([
            'user_id' => $userA->id,
            'friend_id' => $userB->id,
        ]);

        return [
            'userA_id' => $userA->id,
            'userB_id' => $userB->id,
        ];
    }
}
