<?php

namespace App\Http\Livewire\Employees\Modal;

use App\Lib\Employee\EmployeeRepository;
use Livewire\Component;

class SkillList extends Component
{
    public string $employeeCode;

    public function mount(string $employeeCode)
    {
        $this->employeeCode = $employeeCode;
    }

    public function render()
    {
        $employee = EmployeeRepository::findByCode($this->employeeCode);

        return view('livewire.employees.modal.skill-list', [
            'employeeSkills' => $employee->getSkills(),
        ]);
    }
}
