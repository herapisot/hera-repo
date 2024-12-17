<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'tenant_id' => Tenant::factory(), // Creates or associates with a Tenant
            'description' => $this->faker->sentence(), // Random description
            'is_resolved' => $this->faker->boolean(), // Random true/false for resolution
        ];
    }
}
