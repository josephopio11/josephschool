<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'admission_number' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'admission_date' => $this->faker->date(),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'last_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'address' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'alternate_phone' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'email' => $this->faker->safeEmail,
            'photo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'is_active' => $this->faker->boolean,
            'last_active' => $this->faker->dateTime(),
            'previous_school' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'has_sibling' => $this->faker->boolean,
            'can_login' => $this->faker->boolean,
            'password' => $this->faker->password,
        ];
    }
}
