<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Foreign;
use App\Models\Subject;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'subject_code' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'name' => $this->faker->name,
            'atukot_id' => Foreign::factory(),
            'stream_id' => Foreign::factory(),
            'teacher_id' => Foreign::factory(),
            'syllabus' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'notify' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
        ];
    }
}
