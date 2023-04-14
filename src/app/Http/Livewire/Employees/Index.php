<?php

namespace App\Http\Livewire\Employees;

use App\Lib\Employee\Employee;
use App\Lib\Employee\EmployeeRepository;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterOn = '';

    public function render()
    {
        return view('livewire.employees.index', [
            'employees' => EmployeeRepository::searchList($this->search, $this->filterOn),
        ]);
    }
}
