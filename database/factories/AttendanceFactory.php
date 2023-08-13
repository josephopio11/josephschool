<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Attendance;
use App\Models\Foreign;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'student_id' => Foreign::factory(),
            'date' => $this->faker->date(),
            'is_present' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
        ];
    }
}
