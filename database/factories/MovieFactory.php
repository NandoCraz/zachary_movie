<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 3),
            'judul' => fake()->sentence(mt_rand(2, 5)),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            'sutradara' => fake()->name(),
            'body' => collect(fake()->paragraphs(mt_rand(5, 15)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode('')
        ];
    }
}
