<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('employees');
})->name('index');

Route::name('employees')->prefix('/employees')->group(function () {
    Route::get('/create', [EmployeeController::class, 'create'])
        ->name('.create');
    Route::post('/store', [EmployeeController::class, 'store'])
        ->name('.store');
    Route::get('/edit/{employeeCode}', [EmployeeController::class, 'edit'])
        ->middleware([\App\Http\Middleware\EmployeeCodeExists::class])
        ->name('.edit');
    Route::post('/update', [EmployeeController::class, 'update'])
        ->name('.update');
    Route::get('/delete/{employeeCode}', [EmployeeController::class, 'delete'])
        ->middleware(\App\Http\Middleware\EmployeeCodeExists::class)
        ->name('.delete');
});
