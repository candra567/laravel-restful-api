<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpotsVaccins>
 */
class SpotsVaccinsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'locations_spots_vaccins'=>rand(1,3),
            'lists_vaccins'=>rand(1,2)
        ];
    }
}
