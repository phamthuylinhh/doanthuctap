<?
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('users', UserController::class)->only(['store', 'update', 'destroy']);
});
