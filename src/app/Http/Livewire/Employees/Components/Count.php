<?php

namespace App\Http\Livewire\Employees\Components;

use App\Lib\Employee\Employee;
use Livewire\Component;

class Count extends Component
{
    public function render()
    {
        return view('livewire.employees.components.count', [
            'totalCount' => Employee::all('id')->count(),
        ]);
    }
}
