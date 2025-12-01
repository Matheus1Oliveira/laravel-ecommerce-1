<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'modelo' => $this->faker->words(3, true),
            'marca' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
            'faixaetaria' => $this->faker->number_format(2, 10, 1000),
            'image' => $this->faker->imageUrl(400, 300, 'products', true),
        ];
    }
}