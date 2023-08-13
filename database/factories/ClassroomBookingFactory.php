<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ClassroomBooking;
use App\Models\Foreign;

class ClassroomBookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassroomBooking::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'classroom_id' => Foreign::factory(),
            'atukot_id' => Foreign::factory(),
            'date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'is_active' => $this->faker->boolean,
        ];
    }
}
