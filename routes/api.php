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
// routes/api.php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\TaskController;

Route::get('/data', [ApiController::class, 'getData']);
// routes/api.php
// routes/api.php

Route::get('/kazi', [TaskController::class, 'index']);
Route::post('/kazi', [TaskController::class, 'store']);
Route::get('/kazi/{id}', [TaskController::class, 'show']);
Route::put('/kazi/{id}', [TaskController::class, 'update']);
Route::delete('/kazi/{id}', [TaskController::class, 'destroy']);


Route::resource('kazi', TaskController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
