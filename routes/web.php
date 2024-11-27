<?php

use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryAdvancesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HolidayCategoryController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WorkDayController;
use App\Http\Controllers\SalariesController;
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('/');

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix("/admin")->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'create', 'edit']);
    Route::resource('leave_requests', LeaveRequestController::class)->only(['index', 'create', 'edit']);
    Route::resource('salary_advances', SalaryAdvancesController::class)->only(['index', 'create', 'edit']);
    Route::resource('holidays', HolidayController::class)->only(['index', 'create', 'edit']);
    Route::resource('holiday-categories', HolidayCategoryController::class)->only(['index', 'create', 'edit']);
    Route::resource('customers', CustomerController::class)->only(['index', 'create', 'edit']);
    Route::resource('salaries', SalariesController::class)->only(['index', 'create', 'edit']);
    Route::resource('work_days', WorkDayController::class)->only(['index', 'create', 'edit']);
});




require __DIR__ . '/auth.php';

require __DIR__ . '/api.php';
