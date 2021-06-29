<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienCovidController;
use App\Http\Controllers\PenyintasCovidController;
use App\Http\Controllers\TenagaKesehatanController;
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
Route::prefix('admin')->group(function () {

    Auth::routes(['register' => false, 'reset' => false]);
    Route::middleware('auth')->group(function () {
    
        
        // Dashboard
        Route::get('/', function () {
            return view('welcome');
        })->name('dashboard');

    });

});
