<?php

namespace App\Http\Livewire\Employees\Modal;

use App\Lib\Employee\EmployeeSkill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SkillList extends Component
{
    public Collection $skills;

    protected $listeners = [
        'createSkill' => 'addSkillRow',
    ];

    public function mount(Collection $skills)
    {
        $this->skills = $skills;
    }

    public function render()
    {
        return view('livewire.employees.modal.skill-list', [
            'skills' => $this->skills,
        ]);
    }

    public function addSkillRow()
    {
        Log::error('Caught event');
        $this->skills->append(new EmployeeSkill());
    }
}
