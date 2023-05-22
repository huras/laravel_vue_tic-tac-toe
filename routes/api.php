<?php

use App\Http\Controllers\TicTacToeController;
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

Route::get('/last5results', [TicTacToeController::class, 'last5results']);
Route::get('/results', [TicTacToeController::class, 'getResults']);
Route::post('/store-results', [TicTacToeController::class, 'store']);
