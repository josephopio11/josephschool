<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Fee;
use App\Models\Foreign;

class FeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'atukot_id' => Foreign::factory(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'amount' => $this->faker->randomFloat(2, 0, 99999999.99),
            'is_active' => $this->faker->boolean,
        ];
    }
}
