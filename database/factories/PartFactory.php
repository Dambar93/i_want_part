<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'comment' => $this->faker->text,
            'price' => $this->faker->numberBetween(1, 1000),
            'quantity' => $this->faker->numberBetween(1, 3),
            'sku' => $this->faker->name,
            'condition' => "used",
            'part_code' => $this->faker->numberBetween(1000, 10000),
            'category_id' => $this->faker->numberBetween(1, 10),
            'manufacture_id' => $this->faker->numberBetween(1, 10),
            'car_id' => $this->faker->numberBetween(1, 10),
           

        ];
    }
}
