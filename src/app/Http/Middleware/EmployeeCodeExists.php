<?php

namespace App\Http\Middleware;

use App\Lib\Employee\EmployeeRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeCodeExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employee = EmployeeRepository::findByCode($request->route()->parameters['employeeCode']);
        if (!$employee->exists) {
            flash('Employee not found',
                ['p-4', 'mb-4', 'text-sm', 'rounded-lg', 'sasoft-error']);

            return redirect()->route('index');
        }

        return $next($request);
    }
}
