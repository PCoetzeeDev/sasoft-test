<?php

namespace App\Lib\Employee;

use App\Base\BaseFactory;

/**
 * @extends BaseFactory
 */
class EmployeeSkillFactory extends BaseFactory
{
    const SKILL_NAMES = [
        'PHP',
        'Vue',
        'React',
        'Git',
        'Rust',
        'Python',
        'Elixir',
        'C#',
    ];

    const YEARS_EXPERIENCE = [
        '1',
        '2',
        '3',
        '4',
        '5+',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'skill_name' => fake()->randomElement(static::SKILL_NAMES),
            'years_experience' => fake()->randomElement(static::YEARS_EXPERIENCE),
        ];
    }
}
