<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hostel;

class HostelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hostel::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'hostel_type' => $this->faker->regexify('[A-Za-z0-9]{128}'),
            'address' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'capacity' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text,
        ];
    }
}
