<?php
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\SalaryAdvancesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HolidayCategoryController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WorkDayController;
use App\Http\Controllers\SalariesController;
Route::middleware('auth')->prefix('api/admin')->group(function () {
    Route::resource('users', UserController::class)->only(['store', 'update', 'destroy']);
    Route::resource('leave_requests', LeaveRequestController::class)->only(['store', 'update', 'destroy']);
    Route::resource('salary_advances', SalaryAdvancesController::class)->only(['store', 'update', 'destroy']);
    Route::resource('holidays', HolidayController::class)->only(['store', 'update', 'destroy']);
    Route::resource('holiday-categories', HolidayCategoryController::class)->only(['store', 'update', 'destroy']);
    Route::resource('customers', CustomerController::class)->only(['store', 'update', 'destroy']);
    Route::resource('salaries', SalariesController::class)->only(['store', 'update', 'destroy']);
    Route::resource('work_days', WorkDayController::class)->only(['store', 'update', 'destroy']);
});
