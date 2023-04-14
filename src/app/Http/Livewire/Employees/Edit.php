<?php

namespace App\Http\Livewire\Employees;

use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function render()
    {
        return view('livewire.employees.edit');
    }
}
