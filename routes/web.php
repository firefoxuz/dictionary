<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', ['App\Http\Controllers\Admin\User\Login\LoginController', 'index'])->name('auth.login');
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);


Route::group(['middleware' => ['auth', 'disable.caching.on.local']], function () {
    Route::get('/', ['App\Http\Controllers\Admin\Home\HomeController', 'index'])->name('home');
    Route::get('/language/{name}', ['App\Http\Controllers\Admin\Language\LanguageController', 'setLanguage'])->name('lang');
    Route::resource('/user', 'App\Http\Controllers\Admin\User\UserController');
    Route::get('/word/temp', ['App\Http\Controllers\Admin\Word\TempWordController', 'index'])->name('word.requests');
    Route::resource('/word', 'App\Http\Controllers\Admin\Word\WordController');
});
