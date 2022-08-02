<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'manufacture_id' => $this->faker->numberBetween(1, 10),
            'model'=> $this->faker->name,
            'fuel_type' => 'petrol',
            'wheel_placement' => 'left',
            'engine_code' => $this->faker->name,
            'gearbox' => 'manual',
            'body_type' => 'coupe',
            'color' => 'topaz blue',
            'km' => $this->faker->numberBetween(1, 200000),
            'year' => $this->faker->numberBetween(1900, 2021),
            'engine_displacement' => $this->faker->numberBetween(1000, 5000),
            'power' => $this->faker->numberBetween(66, 1000)

        ];
    }
}
