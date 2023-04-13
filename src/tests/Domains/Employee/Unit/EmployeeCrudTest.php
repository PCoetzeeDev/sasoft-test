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
    public function test_createEmployeeEntity(): void
    {
        $employee = EmployeeFactory::emerge()->save();

        $this->assertTrue($employee->exists);
    }
}
