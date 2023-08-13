<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AssessmentType;
use App\Models\Foreign;

class AssessmentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssessmentType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'subject_id' => Foreign::factory(),
            'teacher_id' => Foreign::factory(),
            'atukot_id' => Foreign::factory(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'is_active' => $this->faker->boolean,
        ];
    }
}
