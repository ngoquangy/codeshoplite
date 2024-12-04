<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::post('login', [\App\Http\Controllers\Api\AuthenticationController::class, 'store']);
    Route::post('logout', [\App\Http\Controllers\Api\AuthenticationController::class, 'destroy'])->middleware('auth:api');
    Route::post('register', [\App\Http\Controllers\Api\AuthenticationController::class, 'saveNewUser']);
    Route::get('khoahoc', [\App\Http\Controllers\Api\ApiKhoahocController::class, 'index']);  // GET: Lấy danh sách khóa học
    Route::get('baihoc', [\App\Http\Controllers\Api\ApiBaihocController::class, 'index']);  // GET: Lấy danh sách khóa học

  });
