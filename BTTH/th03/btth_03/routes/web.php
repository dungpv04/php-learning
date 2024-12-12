<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\IssueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
Route::get('/medicines/{id}', [MedicineController::class, 'show'])->name('medicines.show');
Route::get('/medicines/{id}/edit', [MedicineController::class, 'update'])->name('medicines.edit');
Route::put('/medicines/{id}', [MedicineController::class, 'update'])->name('medicines.update');
Route::delete('/medicines/{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy');

Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/{id}', [SaleController::class, 'show'])->name('sales.show');
Route::get('/sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::put('/sales/{id}', [SaleController::class, 'update'])->name('sales.update');
Route::delete('/sales/{id}', [SaleController::class, 'destroy'])->name('sales.destroy');

Route::get('/classes', [ClassesController::class, 'index'])->name('classes.index');
Route::get('/classes/create', [ClassesController::class, 'create'])->name('classes.create');
Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
Route::get('/classes/{id}', [ClassesController::class, 'show'])->name('classes.show');
Route::get('/classes/{id}/edit', [ClassesController::class, 'edit'])->name('classes.edit');
Route::put('/classes/{id}', [ClassesController::class, 'update'])->name('classes.update');
Route::delete('/classes/{id}', [ClassesController::class, 'destroy'])->name('classes.destroy');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('/computers/create', [ComputerController::class, 'create'])->name('computers.create');
Route::post('/computers', [ComputerController::class, 'store'])->name('computers.store');
Route::get('/computers/{id}', [ComputerController::class, 'show'])->name('computers.show');
Route::get('/computers/{id}/edit', [ComputerController::class, 'edit'])->name('computers.edit');
Route::put('/computers/{id}', [ComputerController::class, 'update'])->name('computers.update');
Route::delete('/computers/{id}', [ComputerController::class, 'destroy'])->name('computers.destroy');

Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');
Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
