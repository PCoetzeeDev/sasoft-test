<?php

namespace Database\Seeders;

use App\Lib\Employee\EmployeeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            EmployeeFactory::instantiate([], true)->save();
        }
    }
}
