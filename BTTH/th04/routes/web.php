<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\IssueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/computers', [ComputerController::class, 'index'])->name('computers.index');
Route::get('/computers/create', [ComputerController::class, 'create'])->name('computers.create');
Route::post('/computers', [ComputerController::class, 'store'])->name('computers.store');
Route::get('/computers/{id}', [ComputerController::class, 'show'])->name('computers.show');
Route::get('/computers/{id}/edit', [ComputerController::class, 'edit'])->name('computers.edit');
Route::put('/computers/{id}', [ComputerController::class, 'update'])->name('computers.update');
Route::delete('/computers/{id}', [ComputerController::class, 'destroy'])->name('computers.destroy');

Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/issues/submitCreate', [IssueController::class, 'store'])->name('issues.store');
Route::get('/issues/{id}', [IssueController::class, 'edit'])->name('issues.edit');
Route::put('/issues/{id}/update', [IssueController::class, 'update'])->name('issues.update');
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
