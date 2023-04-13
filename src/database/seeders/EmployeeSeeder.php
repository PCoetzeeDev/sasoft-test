<?php

namespace Database\Seeders;

use App\Lib\Employee\EmployeeAddressFactory;
use App\Lib\Employee\EmployeeFactory;
use App\Lib\Employee\EmployeeSkillFactory;
use App\Lib\Employee\SkillRating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($count = 0; $count <= 43; $count++) {
            $employee = EmployeeFactory::instantiate([], true)->save();
            EmployeeAddressFactory::instantiate([
                'employee_id' => $employee->id,
            ], true)->save();

            $skillsCounter = fake()->numberBetween(0, 8);
            while ($skillsCounter > 0) {
                try {
                    EmployeeSkillFactory::instantiate([
                        'employee_id' => $employee->id,
                        'skill_rating_id' => fake()->randomElement(SkillRating::all())->getId(),
                    ], true)->save();
                } catch (QueryException $exception) {
                    // Probably a dupe crash. Will skip and go to the next employee
                    break;
                }
            }
        }
    }
}
