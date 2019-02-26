<?php

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
    return redirect('/login');
});

Route::resource('iten', 'ItenController')->middleware('auth');

Route::post('/salvar', 'ItenController@store');
Route::post('/update/{id}', 'ItenController@update');

Route::get('users',  ['as' => 'users.edit', 'uses' => 'ProfileController@edit']);
Route::patch('users/update',  ['as' => 'users.update', 'uses' => 'ProfileController@update']);
Route::get('delete-avatar', 'ProfileController@deleteAvatar');

Auth::routes();



