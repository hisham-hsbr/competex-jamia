<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestDemo>
 */
class TestDemoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => Str::random(10),
            'name' => fake()->name(),
            'local_name' => fake()->name(),
            'status' => rand(1, 0),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}