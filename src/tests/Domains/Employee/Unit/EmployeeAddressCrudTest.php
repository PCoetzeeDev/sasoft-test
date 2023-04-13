<?php

namespace Tests\Domains\Employee\Unit;

use App\Lib\Employee\EmployeeAddressFactory;
use App\Lib\Employee\EmployeeAddressRepository;
use App\Lib\Employee\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeAddressCrudTest extends TestCase
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
    public function test_AddressEntity() : void
    {
        // Test first creation:
        $employee = EmployeeFactory::emerge()->save();
        $this->assertTrue($employee->exists);

        $address = EmployeeAddressFactory::emerge();
        $address->setEmployee($employee);
        $this->assertFalse($address->exists);

        $employee->saveAddress($address);
        $this->assertModelExists($employee->getAddress());

        $addresses = EmployeeAddressRepository::getAllAddressesForEmployee($employee);
        $this->assertNotEmpty($addresses);
        $this->assertCount(1, $addresses);

        $this->assertTrue($addresses[0]->is($employee->getAddress()));

        // Test updating:
        $address = EmployeeAddressFactory::emerge();
        $address->setEmployee($employee);
        $employee->saveAddress($address);

        $addresses = EmployeeAddressRepository::getAllAddressesForEmployee($employee);
        $trashedAddresses = EmployeeAddressRepository::getAllAddressesForEmployee($employee, true);
        $this->assertNotEmpty($addresses);
        $this->assertCount(1, $addresses);
        $this->assertCount(2, $trashedAddresses);

        $this->assertTrue($addresses[0]->is($employee->getAddress()));
    }
}
