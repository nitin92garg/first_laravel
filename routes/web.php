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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return "<h1>HEYYYYYYY</h1>";
// });
// function () {
//     return view('welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@showuser');
});

Auth::routes();
Route::post('/home', 'HomeController@saveuser')->name('create');
Route::get('/home', 'HomeController@index');
Route::get('/edit', 'HomeController@view')->name('view');
Route::get('/edit/{id}', 'HomeController@viewUser')->name('edituser');
Route::post('/edit/{id}', 'HomeController@updateUser')->name('updateuser');
Route::post('/edit/delete/{id}', 'HomeController@deleteUser')->name('deleteuser');
// Auth::routes(['register' => false,'password.request' => false, 'reset' => false]);
// Route::get('/users', 'HomeController@showuser')->name('show');



