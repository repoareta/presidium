<?php

use Illuminate\Support\Facades\Route;
// User
use App\Http\Controllers\PasienCovidController;
use App\Http\Controllers\PenyintasCovidController;
use App\Http\Controllers\TenagaKesehatanController;
// Admin
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PasienCovidController as AdminPasienCovidController;
use App\Http\Controllers\Admin\PenyintasCovidController as AdminPenyintasCovidController;
use App\Http\Controllers\Admin\TenagaKesehatanController as AdminTenagaKesehatanController;
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
// User
Route::get('/', function () {
    return view('user.home');
})->name('home');

// Tenaga Kesehatan Covid
Route::prefix('tenaga-kesehatan')->name('tenaga_kesehatan.')->group(function () {
    
    Route::get('/', [TenagaKesehatanController::class, 'create'])->name('create');
    Route::post('/store', [TenagaKesehatanController::class, 'store'])->name('store');
    Route::get('/finish', [TenagaKesehatanController::class, 'finish'])->name('finish');

});

// Penyintas Covid
Route::prefix('penyintas-covid')->name('penyintas_covid.')->group(function () {
    
    Route::get('/', [PenyintasCovidController::class, 'create'])->name('create');
    Route::post('/store', [PenyintasCovidController::class, 'store'])->name('store');
    Route::get('/finish', [PenyintasCovidController::class, 'finish'])->name('finish');

});

// Pasien Covid
Route::prefix('pasien-covid')->name('pasien_covid.')->group(function () {
    
    Route::get('/', [PasienCovidController::class, 'create'])->name('create');
    Route::post('/store', [PasienCovidController::class, 'store'])->name('store');
    Route::get('/finish', [PasienCovidController::class, 'finish'])->name('finish');

});

// Admin
Route::prefix('admin')->name('admin.')->group(function () {

    Auth::routes(['register' => false, 'reset' => false]);
    Route::middleware('auth')->group(function () {
            
        // Dashboard
        Route::get('/', function () {
            return view('admin.welcome');
        })->name('dashboard');

        // Profil
        Route::prefix('profil')->group(function () {
            
            Route::get('/', [ProfileController::class, 'index'])->name('profil');
            Route::put('/', [ProfileController::class, 'update'])->name('profil.update');
            Route::get('/password', [ProfileController::class, 'indexPassword'])->name('profil.password');
            Route::put('/password', [ProfileController::class, 'updatePassword'])->name('profil.password.update');
            
        });

        // // Master Data
        // Route::prefix('master')->name('master.')->group(function () {
            
        //     // Users
        //     Route::get('/users', [UserController::class, 'index'])->name('users.');
        //     Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        //     Route::get('/create', [UserController::class, 'create'])->name('users.create');
        //     Route::post('/store', [UserController::class, 'store'])->name('users.store');
        //     Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
        //     Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        // });

        // Report
        Route::prefix('report')->name('report.')->group(function () {
            
            Route::prefix('formulir')->name('formulir.')->group(function () {

                // Pasien Covid
                Route::get('/pasien-covid', [AdminPasienCovidController::class, 'index'])->name('pasien_covid.');
                Route::get('/pasien-covid/export-excel', [AdminPasienCovidController::class, 'exportExcel'])->name('pasien_covid.excel');
                // Penyintas Covid
                Route::get('/penyintas-covid', [AdminPenyintasCovidController::class, 'index'])->name('penyintas_covid.');
                Route::get('/penyintas-covid/export-excel', [AdminPenyintasCovidController::class, 'exportExcel'])->name('penyintas_covid.excel');
                // Tenaga Kesehatan
                Route::get('/tenaga-kesehatan', [AdminTenagaKesehatanController::class, 'index'])->name('tenaga_kesehatan.');
                Route::get('/tenaga-kesehatan/export-excel', [AdminTenagaKesehatanController::class, 'exportExcel'])->name('tenaga_kesehatan.excel');
                
            });

        });

    });

});
