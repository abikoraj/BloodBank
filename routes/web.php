<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('user.login');
});

// Route::view('/register', 'users.signup')->name('user.register');
Route::view('/req', 'donation_request.add')->name('user.req');

Route::prefix('user')->group(function () {

    Route::name('user.')->group(function () {

        Route::match(['get', 'post'], 'login', [UserController::class, 'login'])->name('login');
        Route::match(['get', 'post'], 'register', [UserController::class, 'register'])->name('register');
    });
});

Route::middleware(['role:2'])->group(function () {

    Route::view('/', 'index')->name('home');

    Route::name('user.')->group(function () {
        Route::prefix('user/profile')->group(function () {
            Route::get('/', [UserController::class, 'profile'])->name('profile');
            Route::get('/edit', [UserController::class, 'edit'])->name('edit');
            Route::post('/edit/{user}', [UserController::class, 'update'])->name('update');
            Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        });
    });

    Route::prefix('donation-request')->group(function () {
        Route::get('/add', [DonationRequestController::class, 'add'])->name('req.add');
        Route::post('/submit', [DonationRequestController::class, 'submit'])->name('req.submit');
        Route::get('/edit/{donreq}', [DonationRequestController::class, 'edit'])->name('req.edit');
        Route::post('/update', [DonationRequestController::class, 'update'])->name('req.update');
        // Route::match(['get', 'post'], '/edit/{dreq}', [DonationRequestController::class, 'edit'])->name('req.edit');
        Route::get('/delete/{donreq}', [DonationRequestController::class, 'delete'])->name('req.delete');
        Route::post('/complete/{donreq}', [DonationRequestController::class, 'markComplete'])->name('req.complete');
    });

    Route::prefix('medical-history')->group(function () {
        Route::get('/add', [MedicalHistoryController::class, 'add_mh'])->name('medical.add');
        Route::post('/submit', [MedicalHistoryController::class, 'submit_mh'])->name('medical.submit');
        Route::get('/report/add', [MedicalHistoryController::class, 'add_mh_report'])->name('medical.report.add');
        Route::get('/report/image/add', [MedicalHistoryController::class, 'add_report_image'])->name('medical.image.add');
    });
});

Route::middleware(['role:1'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::name('admin.')->group(function () {

            Route::get('/logout', [UserController::class, 'logout'])->name('logout');
            Route::view('/', 'admin.dashboard')->name('dashboard');
            Route::get('/users', [AdminController::class, 'user'])->name('users');
            Route::get('/donation-requests', [AdminController::class, 'donationReq'])->name('requests');
        });

        Route::prefix('cities')->group(function () {
            Route::name('cities')->group(function () {
                Route::get('/', [CityController::class, 'index']);
                Route::post('/submit', [CityController::class, 'submit'])->name('.submit');
                Route::post('/update/{city}', [CityController::class, 'update'])->name('.update');
                Route::get('/delete/{city}', [CityController::class, 'delete'])->name('.delete');
            });
        });
    });
});
