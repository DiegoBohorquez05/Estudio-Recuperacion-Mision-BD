<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->randomElement([1,2,3]),
            'name' => fake()->firstName(),
            'area_id' => Area::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id
        ];
    }
}
