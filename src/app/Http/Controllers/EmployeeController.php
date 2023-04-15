<?php

namespace App\Http\Controllers;

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
        dd(__METHOD__);
    }

    public function update(Request $request)
    {
        dd(__METHOD__);
    }
}
