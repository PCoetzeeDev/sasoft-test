<?php

namespace App\Http\Livewire;

use App\Lib\Employee\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeeList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.employee-list', [
            'employees' => Employee::paginate(10),
        ]);
    }
}
