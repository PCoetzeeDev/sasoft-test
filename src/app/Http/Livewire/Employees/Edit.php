<?php

namespace App\Http\Livewire\Employees;

use App\Lib\Employee\Employee;
use App\Lib\Employee\EmployeeRepository;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public string|null $employeeCode;

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function mount(?string $employeeCode = null)
    {
        $this->employeeCode = $employeeCode;
    }

    public function render()
    {
        $employee = new Employee();
        if ($this->employeeCode !== null) {
            $employee = EmployeeRepository::findByCode($this->employeeCode) ?? new Employee();
        }

        return view('livewire.employees.edit', [
            'employee' => $employee,
            'address' => $employee->getAddress(),
        ]);
    }
}
