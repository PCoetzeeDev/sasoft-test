<?php

namespace App\Lib\Profile;

use App\Base\BaseFactory;

/**
 * @extends BaseFactory
 */
class ProfileFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isCompany = false;
        if (rand(1, 100) % 2 === 0) {
            $isCompany = true;
        }

        return [
            'first_name' => !$isCompany ? fake()->firstName() : null,
            'last_name' => !$isCompany ? fake()->lastName() : null,
            'company_name' => $isCompany ? fake()->company() : null,
            'profile_type_id' => null,
        ];
    }
}
