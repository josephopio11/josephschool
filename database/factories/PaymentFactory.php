<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Foreign;
use App\Models\Payment;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'student_id' => Foreign::factory(),
            'payment_type_id' => Foreign::factory(),
            'amount' => $this->faker->randomFloat(2, 0, 99999999.99),
            'date' => $this->faker->date(),
            'is_active' => $this->faker->boolean,
        ];
    }
}
