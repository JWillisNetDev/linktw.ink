<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Link;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fn() => Link::generateUniqueSlug(),
            'dest_url' => $this->faker->url(),
            'created_by_id' => User::factory(),
        ];
    }

    public function anonymous(): static
    {
        return $this->state([
            'created_by_id' => null,
        ]);
    }
}
