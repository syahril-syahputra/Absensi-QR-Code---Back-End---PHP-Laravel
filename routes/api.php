<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthMobileController;
use Illuminate\Http\Request;
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



Route::post('/login', [AuthController::class, 'login']);
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function() {
    // manggil controller sesuai bawaan laravel 8
    Route::post('logout', [AuthController::class, 'logout']);
    // manggil controller dengan mengubah namespace di RouteServiceProvider.php biar bisa kayak versi2 sebelumnya
    Route::post('logoutall', 'AuthController@logoutall');
});




Route::post('/login-mobile', [AuthMobileController::class, 'login']);
Route::post('/absen', [AbsenController::class, 'absen'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    $result = $request->user();
    $result['role'] = [$request->user()->role];
    return $result;
})->middleware('auth:sanctum');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {
    require_once 'admin.api.php';
});
