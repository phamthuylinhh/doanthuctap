<?php
use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth')->prefix('api/admin')->group(function () {
    Route::resource('users', UserController::class)->only(['store', 'update', 'destroy']);
    Route::resource('leave_requests', LeaveRequestController::class)->only(['store', 'update', 'destroy']);
});
