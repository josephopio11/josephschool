<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Foreign;
use App\Models\Staff;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'salutation' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'date_of_birth' => $this->faker->date(),
            'address' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'alternate_phone' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'email' => $this->faker->safeEmail,
            'photo' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'is_active' => $this->faker->boolean,
            'last_active' => $this->faker->dateTime(),
            'staff_role_id' => Foreign::factory(),
            'password' => $this->faker->password,
        ];
    }
}
