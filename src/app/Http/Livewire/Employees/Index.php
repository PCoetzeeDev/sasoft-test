<?php

namespace App\Http\Livewire\Employees;

use App\Lib\Employee\EmployeeRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterOn = '';

    /**
     * @return void
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.employees.index', [
            'employees' => EmployeeRepository::searchList($this->search, $this->filterOn),
        ]);
    }

    public function createEmployee()
    {
        return redirect()->route('employees.create');
    }
}
