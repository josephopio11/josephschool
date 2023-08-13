<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Classroom;

class ClassroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classroom::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'room_number' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'capacity' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text,
            'is_active' => $this->faker->boolean,
        ];
    }
}
