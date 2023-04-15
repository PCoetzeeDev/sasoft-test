<?php

namespace App\Http\Controllers;

use App\Lib\Employee\EmployeeRepository;
use App\Lib\Employee\EmployeeSkill;
use App\Lib\Employee\SkillRating;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * @return View
     */
    public function create() : View
    {
        return view('employees.create', [
            'skillRatingOptions' => SkillRating::getForFormSelectBySlug(),
            'SkillOptions' => EmployeeSkill::SKILL_NAMES,
            'expOptions' => EmployeeSkill::YEARS_EXPERIENCE,
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit(string $employeeCode)
    {
        $employee = EmployeeRepository::findByCode($employeeCode);

        return view('employees.edit', [
            'employee' => $employee,
            'skills' => $employee->getSkills(),
            'skillRatingOptions' => SkillRating::getForFormSelectBySlug(),
            'SkillOptions' => EmployeeSkill::SKILL_NAMES,
            'expOptions' => EmployeeSkill::YEARS_EXPERIENCE,
        ]);
    }

    public function update(Request $request)
    {
//        dd($request->all());
        $employee = EmployeeRepository::findByCode($request->input('employee_code'));

        $employee->update($request->input('basic'));
//        $employee->getAddress()->update($request->input('address'));

        return redirect()->back();
    }

    public function delete(string $employeeCode)
    {
        dd(__METHOD__);
    }
}
