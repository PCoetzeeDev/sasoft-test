<?php

namespace App\Lib\Employee;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository
{
    /**
     * @param string $code
     * @return Employee
     */
    public static function findByCode(string $code) : Employee
    {
        return Employee::query()
            ->where('code', '=', $code)
            ->limit(1)
            ->get()
            ->first() ?? new Employee();
    }

    /**
     * @param string $searchTerm
     * @param string $filterBy
     * @return Paginator
     */
    public static function searchList(string $searchTerm, string $filterBy = '') : Paginator
    {
        $query = Employee::query();

        if (strlen($filterBy) > 1) {
            $query->where($filterBy, 'ilike', '%' . $searchTerm . '%');
        } else {
            $query
                ->where('first_name', 'ilike', '%' . $searchTerm . '%')
                ->orWhere('last_name', 'ilike', '%' . $searchTerm . '%')
                ->orWhere('contact_number', 'ilike', '%' . $searchTerm . '%');
        }

        return $query->simplePaginate(10);
    }
}
