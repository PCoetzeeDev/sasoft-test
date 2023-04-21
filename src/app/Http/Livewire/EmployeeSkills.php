<?php

namespace App\Http\Livewire;

use App\Lib\Employee\Employee;
use App\Lib\Employee\EmployeeSkill;
use App\Lib\Employee\EmployeeSkillFactory;
use App\Lib\Employee\SkillRating;
use Illuminate\View\View;
use Livewire\Component;

class EmployeeSkills extends Component
{
    public Employee $employee;
    public array $skills;
    public $skillRatingOptions;
    public $expOptions;

    protected $listeners = [
        'skillRowAdded' => 'addSkillRow',
        'skillRowRemoved' => 'removeSkillRow',
    ];

    /**
     * @return void
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    public function addSkillRow() : void
    {
        $this->skills[] = $this->makeSkill();
    }

    /**
     * @param int $rowNr
     * @return void
     */
    public function removeSkillRow(int $rowNr) : void
    {
        if (count($this->skills) > 0) {
            unset($this->skills[$rowNr]);
            $this->skills = array_values($this->skills);
        }
    }

    /**
     * @param Employee $employee
     * @return void
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    public function mount(Employee $employee) : void
    {
        $this->employee = $employee;
        $this->skillRatingOptions = SkillRating::getForFormSelectBySlug();
        $this->expOptions = EmployeeSkill::YEARS_EXPERIENCE;
        $this->skills = $employee->getSkills()->isEmpty() ? [$this->makeSkill()] : $employee->getSkillsArr();
    }

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.employee-skills');
    }

    /**
     * @return array
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    private function makeSkill() : array
    {
        return EmployeeSkillFactory::instantiate([
            'employee_id' => null,
            'skill_name' => null,
            'years_experience' => '1',
            'skill_rating' => SkillRating::getBySlug(SkillRating::SLUG_RATING_BEGINNER)->getId(),
        ])->toArray();
    }
}
