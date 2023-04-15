<?php

namespace App\Http\Controllers;

use App\Lib\Employee\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * @return View
     */
    public function create() : View
    {
        return view('employees.create');
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
        ]);
    }

    public function update(Request $request)
    {
        dd($request->all());
    }
}
