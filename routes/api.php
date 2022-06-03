<?php

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

Route::get('/words', ['App\Http\Controllers\Api\Word\WordController', 'index']);
Route::get('/words/{word}', ['App\Http\Controllers\Api\Word\WordController', 'show']);
Route::post('/words/search', ['App\Http\Controllers\Api\Word\WordController', 'search']);
Route::post('/words/temp', ['App\Http\Controllers\Api\Word\TempWordController', 'store']);
