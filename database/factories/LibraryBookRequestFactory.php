<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Foreign;
use App\Models\LibraryBookRequest;

class LibraryBookRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LibraryBookRequest::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'student_id' => Foreign::factory(),
            'book_id' => Foreign::factory(),
            'request_date' => $this->faker->date(),
            'is_active' => $this->faker->boolean,
        ];
    }
}
