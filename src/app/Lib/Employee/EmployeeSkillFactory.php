<?php

namespace App\Lib\Employee;

use App\Base\BaseFactory;

/**
 * @extends BaseFactory
 */
class EmployeeSkillFactory extends BaseFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $skillNames = [
            'PHP',
            'Vue',
            'React',
            'Git',
            'Rust',
            'Python',
            'Elixir',
            'C#',
        ];

        $yearsExperienceOptions = [
            '1',
            '2',
            '3',
            '4',
            '5+',
        ];

        return [
            'skill_name' => fake()->randomElement($skillNames),
            'years_experience' => fake()->randomElement($yearsExperienceOptions),
        ];
    }
}
