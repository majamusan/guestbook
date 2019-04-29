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

Route::get('/', 'HomeController@welcome')->name('welcome');
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::post('/user/save', 'UserController@store')->name('user/save');
    
    Route::post('/guestbook/save',          'GuestbookController@store')->name('guestbook/save');
    Route::post('/guestbook/responce',      'GuestbookController@responce')->name('guestbook/responce');
    Route::get('/guestbook/delete/{id}',    'GuestbookController@destroy')->name('guestbook/delete');
});
