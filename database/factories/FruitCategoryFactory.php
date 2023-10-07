<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FruitCategory>
 */
class FruitCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = \Illuminate\Support\Arr::random(['Apple', 'Mango', 'Orange', 'Guava']),
            'slug' => Str::slug($name),
        ];
    }
}
