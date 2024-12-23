<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiPendaftaranController;


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



Route::post('login', [ApiLoginController::class, 'login']);
Route::get('/logout', [ApiLoginController::class, 'logout'])->middleware(['auth:sanctum']);


//Pendaftaran
Route::get('/pendaftaran', [ApiPendaftaranController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/pendaftaran/{id}', [ApiPendaftaranController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/pendaftaran', [ApiPendaftaranController::class, 'store']);


// Route::get('/cobaapi', function(){
//     dd("wow");
// });
