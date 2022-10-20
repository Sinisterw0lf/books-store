<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(4),
            'price' => fake()->randomFloat(2,1,50),
            'author' => fake()->name(),
            'nombre_pages' => fake()->numberBetween(50, 500),
            'created_at' => now(),
        ];
    }
}
