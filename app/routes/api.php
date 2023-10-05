<?php

use App\Http\Controllers\ClientController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('/client/{id}', [ClientController::class, 'get']);
Route::post('/client/save', [ClientController::class, 'save']);
Route::put('/client/update/{id}', [ClientController::class, 'update']);
Route::delete('/client/delete/{id}', [ClientController::class, 'destroy']);
