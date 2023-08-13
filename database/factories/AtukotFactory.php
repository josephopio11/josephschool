<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Atukot;

class AtukotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Atukot::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'numeric_name' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text,
            'is_active' => $this->faker->boolean,
        ];
    }
}
