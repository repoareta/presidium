<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Ajax Select2
Route::get('/alumni/{id}', [AjaxController::class, 'getAlumni']);
Route::get('/regency/{id}', [AjaxController::class, 'getRegency']);
Route::get('/district/{id}', [AjaxController::class, 'getDistrict']);
Route::get('/village/{id}', [AjaxController::class, 'getVillage']);

