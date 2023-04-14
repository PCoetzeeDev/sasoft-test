<?php

namespace App\Http\Livewire\Employees\Components;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EmployeeModal extends Component
{
    public bool $showModal = false;

    protected $listeners = [
        'create' => 'showModal',
    ];

    /**
     * @return void
     */
    public function showModal() : void
    {
        Log::debug('event caught');
        $this->showModal = true;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.employees.components.employee-modal');
    }
}
