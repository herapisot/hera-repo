<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'tenant_id' => Tenant::factory(), // Creates a new tenant or associate with existing one
            'amount' => $this->faker->randomFloat(2, 100, 2000), // Random amount between 100 and 2000
            'payment_method' => $this->faker->randomElement(['cash', 'credit_card', 'bank_transfer']),
            'payment_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date within the last year
        ];
    }
}
