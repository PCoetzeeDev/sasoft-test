<?php

namespace App\Http\Livewire\Employees;

use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function render()
    {
        return view('livewire.employees.create', [
            'skills' => new Collection(),
        ]);
    }
}
