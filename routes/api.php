<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuoteController;
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

// Public Routes
Route::get('/quotes', [QuoteController::class, 'index']);
Route::get('/quotes/{quote}', [QuoteController::class, 'show']);
Route::get('/quotes/search/{quote}', [QuoteController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);




// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/quotes', [QuoteController::class, 'store']);
    Route::delete('/quotes/{id}', [QuoteController::class, 'destroy']);
    Route::put('/quotes/{id}', [QuoteController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


