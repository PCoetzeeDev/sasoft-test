<?php

namespace App\Lib\Employee;

use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    /**
     * @param array $filterFields
     * @return Collection
     */
    public static function searchWithFilter(array $filterFields = []) : Collection
    {
        $query = Employee::query()->get();
        return $query;
//        if (!empty($filterFields)) {
//            $query->where()
//        }
    }
}
