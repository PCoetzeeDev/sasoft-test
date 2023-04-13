<?php

namespace App\Lib\Employee;

use App\Base\BaseFactory;

/**
 * @extends BaseFactory
 */
class EmployeeAddressFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => fake()->streetName(),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'country' => fake()->country(),
        ];
    }
}
