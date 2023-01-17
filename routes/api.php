<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'areas', 'middleware' => ['auth','role:admin']], function($router){
    Route::post('',[AreasController::class,'create']);
    Route::get('',[AreasController::class,'index']);
    Route::get('/{id}',[AreasController::class,'show']);
    Route::put('/{id}',[AreasController::class,'update']);
    Route::delete('/{id}',[AreasController::class,'destroy']);
});

Route::group(['prefix' => 'course', 'middleware' => ['auth'. 'role:admin|teacher']], function($router){
    Route::post('',[CourseController::class,'create']);
    Route::get('',[CourseController::class,'index']);
    Route::get('/{id}',[CourseController::class,'show']);
    Route::put('/{id}',[CourseController::class,'update']);
    Route::delete('/{id}',[CourseController::class,'destroy']);
});
