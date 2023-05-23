<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CommonController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\StateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::prefix('/admin')->group(function () {

        //Login
        Route::get('/', [AuthController::class, 'index'])->name('admin.login');
        Route::get('login', [AuthController::class, 'index'])->name('admin.login');
        Route::post('check_login', [AuthController::class, 'checkLogin'])->name('admin.check_login');

        Route::middleware(['middleware' => 'admin'])->group(function () {

        //Dashboard
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

        //Logout
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

        //Country
        Route::resource('country', CountryController::class);
        Route::get('country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
        Route::post('country/update/{id}', [CountryController::class, 'update'])->name('country.update');
        
        //State
        Route::resource('state', StateController::class);
        Route::get('state/edit/{id}', [StateController::class, 'edit'])->name('state.edit');
        Route::post('state/update/{id}', [StateController::class, 'update'])->name('state.update');

        //Change Status
        Route::post('change_status/',[CommonController::class,'changeStatus'])->name('change_status');
        Route::post('delete_record/',[CommonController::class,'deleteRecord'])->name('deleteRecord');
    });
});