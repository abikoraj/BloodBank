<?php

use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\UserController;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {

    Route::post('search',  [HomeController::class, 'index']);
    Route::get('user', function () {
        return response()->json(Auth::user());
    });
    Route::post('editUser', [UserController::class, 'apiUpdate']);
    Route::get('near-me', [HomeController::class, 'apiNearMe']);

    Route::post('addrequest', [DonationRequestController::class, 'apiSubmitRequest']);
    Route::post('editrequest', [DonationRequestController::class, 'apiUpdateRequest']);
    Route::post('delRequest', [DonationRequestController::class, 'apiDel_Request']);

    Route::post('addMedicalHistory', [MedicalHistoryController::class, 'apiSubmit_mh']);
    Route::post('editMedicalHistory', [MedicalHistoryController::class, 'apiUpdate_mh']);
    Route::post('delMedicalHistory', [MedicalHistoryController::class, 'apiDel_mh']);

    Route::post('addReport', [MedicalHistoryController::class, 'apiSubmit_report']);
    Route::post('editReport', [MedicalHistoryController::class, 'apiUpdate_report']);
    Route::post('delReport', [MedicalHistoryController::class, 'apiDel_report']);

    Route::post('addImage', [MedicalHistoryController::class, 'apiSubmit_Image']);
    Route::post('delImage', [MedicalHistoryController::class, 'apiDel_Image']);
});


Route::post('ttsignup',  [UserController::class, 'apiSignup']);
Route::post('ttsignin',  [UserController::class, 'apiSignin']);
