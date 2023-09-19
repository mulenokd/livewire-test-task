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

Route::view('/', 'welcome')->name('home');

Route::namespace('\App\Actions')->group(function () {
    Route::get('/pay', 'Pay')->name('page.pay');
    Route::get('/status', 'Status')->name('page.status');
});