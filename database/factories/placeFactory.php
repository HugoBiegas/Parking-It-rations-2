<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class placeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ProrioActu'=>0,
            'nomPlace'=>"place libre",
        ];
    }
}
