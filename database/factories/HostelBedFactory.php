<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Foreign;
use App\Models\HostelBed;

class HostelBedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HostelBed::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'bed_number' => $this->faker->regexify('[A-Za-z0-9]{128}'),
            'room_id' => Foreign::factory(),
            'price' => $this->faker->numberBetween(-10000, 10000),
            'description' => $this->faker->text,
        ];
    }
}
