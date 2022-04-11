<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeCOntroller;
use Illuminate\Support\Facades\Route;

Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department/{tgl}', [DepartmentController::class, 'byDate']);
Route::get('/department/{id}/{tgl}', [DepartmentController::class, 'byDepartmentAndDate']);

Route::post('department', [DepartmentController::class, 'create']);
Route::delete('department/{id}', [DepartmentController::class, 'destroy']);
Route::patch('department/{id}', [DepartmentController::class, 'update']);

Route::get('detail-department/{id}', [EmployeCOntroller::class, 'index']);
Route::post('detail-department', [EmployeCOntroller::class, 'create']);
Route::delete('detail-department/{id}', [EmployeCOntroller::class, 'destroy']);
Route::patch('detail-department/{id}', [EmployeCOntroller::class, 'update']);
?>
