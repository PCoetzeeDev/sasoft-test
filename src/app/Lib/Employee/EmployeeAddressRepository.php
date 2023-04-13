<?php

namespace App\Lib\Employee;

use Illuminate\Database\Eloquent\Collection;

class EmployeeAddressRepository
{
    /**
     * @param Employee $employee
     * @param bool $withTrashed
     * @return Collection
     */
    public static function getAllAddressesForEmployee(Employee $employee, bool $withTrashed = false) : Collection
    {
        return EmployeeAddress::query()
            ->withTrashed($withTrashed)
            ->where('employee_id', '=', $employee->id)
            ->get();
    }
}
