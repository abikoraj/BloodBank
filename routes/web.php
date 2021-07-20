<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect()->route('user.login');
// });

// Route::view('/register', 'users.signup')->name('user.register');
// Route::view('/login', 'users.login')->name('user.login');

Route::match(['get', 'post'], '/user/login', [UserController::class, 'login'])->name('user.login');
Route::match(['get', 'post'], '/user/register', [UserController::class, 'register'])->name('user.register');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'index')->name('home');
    Route::prefix('user/profile')->group(function () {
        Route::get('/', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit/{user}', [UserController::class, 'update'])->name('user.update');
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    });
});
