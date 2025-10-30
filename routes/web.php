<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('department', DepartmentController::class);
Route::resource('position', PositionController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('salary', SalaryController::class);
Route::resource('attendance', AttendanceController::class);
