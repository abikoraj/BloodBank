<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Models\MedicalHistory;
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
    Route::get('requests-near-me', [HomeController::class, 'nearme'])->name('nearme');
    Route::post('search', [HomeController::class, 'index'])->name('search');

    Route::prefix('user/profile')->group(function () {
        Route::name('user.')->group(function () {
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
        Route::name('medical.')->group(function () {
            Route::get('/{mh}', [MedicalHistoryController::class, 'view'])->name('show');

            Route::get('/add', [MedicalHistoryController::class, 'add_mh'])->name('add');
            Route::post('/submit', [MedicalHistoryController::class, 'submit_mh'])->name('submit');
            Route::post('/update/{mh}', [MedicalHistoryController::class, 'update_mh'])->name('update');
            Route::get('del/{mh}', [MedicalHistoryController::class, 'delete_mh'])->name('delete');

            Route::post('/report/submit', [MedicalHistoryController::class, 'submit_report'])->name('report.submit');
            Route::post('/report/update', [MedicalHistoryController::class, 'update_report'])->name('report.update');
            Route::get('/report/del/{report}', [MedicalHistoryController::class, 'delete_report'])->name('report.delete');

            Route::post('/report/image/submit', [MedicalHistoryController::class, 'submit_image'])->name('image.submit');
            Route::get('/images/del/{image}', [MedicalHistoryController::class, 'del_image'])->name('image.delete');
            Route::get('/report/del/{report}', [MedicalHistoryController::class, 'delete_report'])->name('report.delete');
        });
    });
});

Route::middleware(['role:1'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::name('admin.')->group(function () {

            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('/logout', [UserController::class, 'logout'])->name('logout');
            // Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
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

        Route::prefix('sliders')->group(function () {
            Route::name('sliders.')->group(function () {
                Route::get('/', [SliderController::class, 'index'])->name('index');
                Route::post('/submit', [SliderController::class, 'submit'])->name('submit');
                Route::post('/update/{slider}', [SliderController::class, 'update'])->name('update');
                Route::get('/delete/{slider}', [SliderController::class, 'delete'])->name('delete');
            });
        });
    });
});
