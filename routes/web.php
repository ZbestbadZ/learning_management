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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('list_subject', 'SubjectController@index')->name('user.list_subject_');
    Route::get('search_subject','SubjectController@getSearch')->name('search');

});

Route::group(['prefix' => 'admin', 'middleware' => 'isadmin'], function () {
    Route::get('list_user', 'AdminController@getListUser')->name('admin.user.list');
    Route::post('notify', 'AdminController@createNotify')->name('notify');
});