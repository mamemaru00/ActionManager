<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'trading_company_id' => $this->faker->numberBetween(1, 3),
            'project_code' => $this->faker->numberBetween(1, 999999),
            'project_name' => $this->faker->word(),
            'sales_in_charge' => $this->faker->dateTimeBetween('now', '+1years'),
            'order_amount' => $this->faker->numberBetween(1, 999999),
            'order_date' => $this->faker->dateTimeBetween('now', '+1years'),
            'status' => $this->faker->randomElement(['有効化', '無効化']),
        ];
    }
}
