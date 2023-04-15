<?php

namespace App\Lib\Employee;

use App\Base\BaseFactory;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * This should probably rather be in a Repository, but it felt a bit too much to create a repo just for this function
     *
     * @param array $skillsArr
     * @param Employee $employee
     * @return Collection
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    public static function transformIntoCollectionForEmployee(array $skillsArr, Employee $employee) : Collection
    {
        $skills = new Collection();

        foreach ($skillsArr as $skill) {
            $skills->push(static::instantiate([
                'employee_id' => $employee->id,
                'skill_name' => $skill['skill_name'],
                'years_experience' => $skill['years_experience'],
                'skill_rating_id' => SkillRating::getBySlug($skill['skill_rating'])->getId(),
            ]));
        }

        return $skills;
    }
}
