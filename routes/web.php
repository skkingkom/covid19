<?php

use Illuminate\Support\Facades\Route;
use App\Models\UserCovidInfo;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register-user', 'CovidController@registerUser')->name('register-form');
Route::post('/save-register-user', 'CovidController@saveUser')->name('save-register-form');

