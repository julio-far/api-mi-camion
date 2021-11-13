<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\VehiculoController;

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

Route::get('/piloto', [PilotoController::class, 'index']);
Route::post('/piloto', [PilotoController::class, 'create']);
Route::put('/piloto/{id}', [PilotoController::class, 'update']);
Route::get('/piloto/{id}', [PilotoController::class, 'show']);
Route::delete('/piloto/{id}', [PilotoController::class, 'destroy']);

Route::get('/vehiculo', [VehiculoController::class, 'index']);
Route::post('/vehiculo', [VehiculoController::class, 'create']);
Route::put('/vehiculo/{id}', [VehiculoController::class, 'update']);
Route::get('/vehiculo/{id}', [VehiculoController::class, 'show']);
Route::delete('/vehiculo/{id}', [VehiculoController::class, 'destroy']);
