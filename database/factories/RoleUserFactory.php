<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoleUser>
 */
class RoleUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $roles = Role::pluck('id')->all();
        $users = User::pluck('id')->all();

        return [
            'user_id' => fake()->randomElement($users),
            'role_id' => fake()->randomElement($roles),
        ];
    }
}
