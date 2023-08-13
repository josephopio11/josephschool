<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LibraryBooks;

class LibraryBooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LibraryBooks::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'isbn' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'title' => $this->faker->sentence(4),
            'author' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'publisher' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'edition' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'year' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'pages' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'copies' => $this->faker->numberBetween(-10000, 10000),
            'price' => $this->faker->randomFloat(2, 0, 99999999.99),
            'category' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'rack' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'is_active' => $this->faker->boolean,
        ];
    }
}
