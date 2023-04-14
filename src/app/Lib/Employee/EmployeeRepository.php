<?php

namespace App\Lib\Employee;

use Illuminate\Contracts\Pagination\Paginator;
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
