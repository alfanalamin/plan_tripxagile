<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Trip;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [ 
    AuthenticationController::class, 'login']);

Route::get('/logout', [
    AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);

Route::get('/me', [
    AuthenticationController::class, 'me'])->middleware(['auth:sanctum']);

Route::get('/posts', [ 
    TripController::class, 'index'])->middleware(['auth:sanctum']);


Route::get('/posts/{id}', [ 
    TripController::class, 'show'])->middleware(['auth:sanctum']);

Route::get('/posts2/{id}', [ 
    TripController::class, 'show2'])->middleware(['auth:sanctum']);



