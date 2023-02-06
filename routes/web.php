<?php
 
use App\Http\Controllers\HomeController;
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

Auth::routes(['register' => false]);

 

Route::middleware('auth')->name('report.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('show', [HomeController::class, 'show'])->name('show');
    Route::get('overdue', [HomeController::class, 'overdue'])->name('overdue');

    Route::post('store', [HomeController::class, 'store'])->name('store');
    Route::get('edit/{report}', [HomeController::class, 'edit'])->name('edit');
    Route::post('update/{report}', [HomeController::class, 'update'])->name('update');

    Route::get('confirm/{report}', [HomeController::class, 'confirm'])->name('confirm');
    Route::get('close/{report}', [HomeController::class, 'close'])->name('close');



    Route::middleware('CheckRole:master')->group(function () {
        Route::post('report/destroy', [HomeController::class, 'delete'])->name('destroy');
        Route::get('export', [HomeController::class, 'export'])->name('export.index');
        Route::get('/export/details/', [HomeController::class, 'export_details']);
    });
});


Route::middleware('auth')->name('user.')->controller(UserController::class)
    ->group(
        function () {

            Route::get('show/user', 'edit')->name('show');
            Route::post('update/userData/{user}', 'update')->name('update');

            Route::get('new/user', 'show')->name('new');
            Route::post('user/store', 'store')->name('store');
        }
    );
