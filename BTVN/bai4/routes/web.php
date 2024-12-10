<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('employee', [EmployeeController::class, 'index']) -> name('employee.index');
Route::post('employee/create', [EmployeeController::class, 'create']);
Route::get('employee/update', [EmployeeController::class, 'update']);
Route::patch('employee/update/submit', [EmployeeController::class,'submitUpdate']);
Route::delete('employee/delete', [EmployeeController::class,'delete']) -> name('employee.delete');