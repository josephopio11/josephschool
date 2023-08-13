<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\School;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->text,
            'starting_date' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'website' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'facebook' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'twitter' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'instagram' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'youtube' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'logo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'is_active' => $this->faker->boolean,
        ];
    }
}
