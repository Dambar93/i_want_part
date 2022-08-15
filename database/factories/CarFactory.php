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
            'manufacture_id' => 1,
            'model' => 'E46',
            'fuel_type' => 'diesel',
            'wheel_placement' => 'left',
            'engine_code' => 'N47',
            'gearbox' => 'manual',
            'body_type' => 'coupe',
            'color' => 'topaz blue',
            'km' => $this->faker->numberBetween(1, 200000),
            'year' => $this->faker->numberBetween(1996, 2005),
            'engine_displacement' => $this->faker->numberBetween(2000, 3000),
            'power' => $this->faker->numberBetween(100, 200)

        ];
    }
}
