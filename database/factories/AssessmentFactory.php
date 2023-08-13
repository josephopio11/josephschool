<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Assessment;
use App\Models\Foreign;

class AssessmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assessment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'assessment_type_id' => Foreign::factory(),
            'atukot_id' => Foreign::factory(),
            'assessment_date' => $this->faker->date(),
            'stream_id' => Foreign::factory(),
            'school_session_id' => Foreign::factory(),
            'pass_mark' => $this->faker->numberBetween(-10000, 10000),
            'full_mark' => $this->faker->numberBetween(-10000, 10000),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'comments' => $this->faker->text,
            'assessment_file' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'is_active' => $this->faker->boolean,
        ];
    }
}
