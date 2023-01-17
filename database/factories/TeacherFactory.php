<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> fake()->name(),
            'lastname'=> fake()->lastName(),
            'document'=>fake()->unique()->randomNumber(5),
            'age' =>fake()->randomNumber(2),
            'area_id' => Area::all()->random()->id
        ];
    }
}
