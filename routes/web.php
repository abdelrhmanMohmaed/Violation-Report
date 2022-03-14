<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\mails\MailController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\ReportController;
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


Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/ex', [HomeController::class, 'ex']);
    Route::post('upload/report', [HomeController::class, 'store']);
    // Report
    Route::prefix('/reports-list')->group(function () {
        
        Route::get('/', [ReportController::class, 'show']);
        Route::get('search', [ReportController::class, 'search']);
        Route::get('edit-report/{id}', [ReportController::class, 'edit']);
        Route::post('update-report/{id}', [ReportController::class, 'update']);
        
        Route::get('over-report', [ReportController::class, 'overReport']);
        
        Route::get('toggle/status/{id}', [AdminController::class, 'toggle']);
        Route::get('toggle/confirm/{id}', [AdminController::class, 'toggleConfirm']);
        Route::get('delete/{id}', [AdminController::class, 'delete']);
        // Route::get('send-mail', [MailController::class, 'sendEmail']);
        Route::get('change-password', [AuthController::class, 'index']);
        Route::post('change-update', [AuthController::class, 'updatePass']);
    });
});
