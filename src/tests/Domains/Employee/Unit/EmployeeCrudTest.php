<?php

namespace Tests\Domains\Employee\Unit;

use App\Lib\Employee\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     */
    public function test_createUpdateDeleteEmployeeEntity() : void
    {
        $employee = EmployeeFactory::emerge()->save();
        $this->assertTrue($employee->exists);

        $employeeBackup = clone $employee;

        do {
            $firstName = fake()->firstName();
        } while (
            $firstName === $employeeBackup->first_name
        );
        $employee->first_name = $firstName;
        $employee->save();

        $this->assertTrue($employeeBackup->first_name !== $employee->first_name);

        $employee->delete();

        $this->assertTrue($employee->trashed());
        $this->assertFalse($employeeBackup->email_address === $employee->email_address);
        $this->assertFalse($employeeBackup->contact_number === $employee->contact_number);
    }
}
