<?php

namespace App\Lib\Employee;

use App\Base\BaseFactory;

/**
 * @extends BaseFactory
 */
class EmployeeFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'contact_number' => fake()->phoneNumber(),
            'email_address' => fake()->safeEmail(),
            'date_of_birth' => fake()->dateTime(),
        ];
    }
}
