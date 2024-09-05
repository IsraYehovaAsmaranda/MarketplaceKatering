<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchant_id' => User::factory(),
            'category_id' => Category::factory(),
            'food_name' => fake()->name(),
            'description' => fake()->text(),
            'image_url' => fake()->imageUrl(),
            'price' => fake()->randomNumber(),
        ];
    }
}
