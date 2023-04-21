<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Lib\Employee\Employee;
use App\Lib\Employee\EmployeeAddressFactory;
use App\Lib\Employee\EmployeeFactory;
use App\Lib\Employee\EmployeeRepository;
use App\Lib\Employee\EmployeeSkill;
use App\Lib\Employee\EmployeeSkillFactory;
use App\Lib\Employee\SkillRating;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
            'employee' => new Employee(),
        ]);
    }

    /**
     * @param StoreEmployeeRequest $request
     * @return RedirectResponse
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    public function store(StoreEmployeeRequest $request)
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

            flash('Employee successfully created',
                ['p-4', 'mb-4', 'text-sm', 'rounded-lg', 'sasoft-success']);
        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error($exception->getMessage(), $exception->getTrace());

            flash('Unable to create employee, see errors below',
                ['p-4', 'mb-4', 'text-sm', 'rounded-lg', 'sasoft-error']);
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
     * @param UpdateEmployeeRequest $request
     * @return RedirectResponse
     * @throws \App\Exceptions\InstantiateAttemptInWrongEnvException
     * @throws \App\Exceptions\UnknownEnvironmentException
     */
    public function update(UpdateEmployeeRequest $request)
    {
        $employee = EmployeeRepository::findByCode($request->input('employee_code'));
        $address = EmployeeAddressFactory::instantiate($request->input('address'));
        $skills = EmployeeSkillFactory::transformIntoCollectionForEmployee($request->input('skills'), $employee);

        try {
            DB::beginTransaction();

            $employee
                ->saveAddress($address)
                ->saveSkills($skills)
                ->update($request->input('basic'));

            DB::commit();

            flash('Employee successfully updated',
                ['sasoft-success']);
        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error($exception->getMessage(), $exception->getTrace());

            flash('Failed to update employee',
                ['sasoft-error']);
        }

        return redirect()->back();
    }

    /**
     * @param string $employeeCode
     * @return RedirectResponse
     * @throws \Exception
     */
    public function delete(string $employeeCode)
    {
        try {
            $employee = EmployeeRepository::findByCode($employeeCode);
            $employee->delete();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());

            flash('Failed to delete employee',
                ['p-4', 'mb-4', 'text-sm', 'rounded-lg', 'sasoft-error']);
        }
        flash('Employee successfully deleted',
                ['p-4', 'mb-4', 'text-sm', 'rounded-lg', 'sasoft-success']);

        return redirect()->back();
    }
}
