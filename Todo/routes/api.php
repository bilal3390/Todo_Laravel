<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\TaskGuard;
use App\Http\Kernel;

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

Route::get('/', function () {
    return "Welcome to main page";
});

// Route::get('/read',[TaskController::class,'read'])->middleware('guard');
// Route::post('/create',[TaskController::class,'create']);
// Route::post('/update/{tasks}',[TaskController::class,'update']);
// Route::post('/delete/{tasks}',[TaskController::class,'delete']);
// Route::post('/deleteall',[TaskController::class,'deleteall']);


Route::middleware(['guard'])->group(function () {
    Route::get('/read',[TaskController::class,'read']);
    Route::post('/create',[TaskController::class,'create']);
    Route::post('/update/{tasks}',[TaskController::class,'update']);
    Route::post('/delete/{tasks}',[TaskController::class,'delete']);
    Route::post('/deleteall',[TaskController::class,'deleteall']);

});


Route::post('/signup',[ClientController::class,'signup']);
Route::post('/login',[ClientController::class,'login']);
Route::post('/logout',[ClientController::class,'logout']);
