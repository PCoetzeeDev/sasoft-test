<?php

namespace App\Http\Controllers;

use App\Lib\Employee\EmployeeAddressFactory;
use App\Lib\Employee\EmployeeFactory;
use App\Lib\Employee\EmployeeRepository;
use App\Lib\Employee\EmployeeSkill;
use App\Lib\Employee\EmployeeSkillFactory;
use App\Lib\Employee\SkillRating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'expOptions' => EmployeeSkill::YEARS_EXPERIENCE,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $employee = EmployeeFactory::instantiate($request->input('basic'));
            $employee->save();

            $address = EmployeeAddressFactory::instantiate($request->input('address'));
            $skills = EmployeeSkillFactory::transformIntoCollectionForEmployee($request->input('skills'), $employee);

            $employee
                ->saveAddress($address)
                ->saveSkills($skills);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return redirect()->route('employees.edit', ['employeeCode' => $employee->code]);
    }

    /**
     * @param string $employeeCode
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(string $employeeCode)
    {
        $employee = EmployeeRepository::findByCode($employeeCode);

        return view('employees.edit', [
            'employee' => $employee,
            'skills' => $employee->getSkills(),
            'skillRatingOptions' => SkillRating::getForFormSelectBySlug(),
            'expOptions' => EmployeeSkill::YEARS_EXPERIENCE,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    public function update(Request $request)
    {
        $employee = EmployeeRepository::findByCode($request->input('employee_code'));
        $address = EmployeeAddressFactory::instantiate($request->input('address'));
        $skills = EmployeeSkillFactory::transformIntoCollectionForEmployee($request->input('skills'), $employee);

        $employee
            ->saveAddress($address)
            ->saveSkills($skills)
            ->update($request->input('basic'));

        return redirect()->back();
    }

    /**
     * @param string $employeeCode
     * @return RedirectResponse
     * @throws \Exception
     */
    public function delete(string $employeeCode)
    {
        $employee = EmployeeRepository::findByCode($employeeCode);
        $employee->delete();

        return redirect()->back();
    }
}
