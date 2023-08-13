<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Foreign;
use App\Models\HostelRoom;

class HostelRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HostelRoom::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'room_number' => $this->faker->regexify('[A-Za-z0-9]{128}'),
            'hostel_id' => Foreign::factory(),
            'capacity' => $this->faker->numberBetween(-10000, 10000),
            'room_type_id' => Foreign::factory(),
        ];
    }
}
