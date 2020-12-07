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
    Route::get('search_subject', 'SubjectController@getSearch')->name('search');
    Route::get('list_notify', 'SubjectController@getListNotify')->name('list_notify');
    Route::get('list_student', 'UserController@index')->name('list_student');
    Route::get('search_student', 'UserController@getSearchStudent')->name('search_student');
    Route::get('score', 'SubjectController@getScore')->name('score');
    Route::get('rate', 'SubjectController@getRate')->name('rate');
    Route::get('all_score', 'SubjectController@getAllScore')->name('all_score');
    Route::get('subject/{id}', 'SubjectController@getDetailSubject');
    Route::post('register_subject/{id}', 'SubjectController@store');
});

Route::group(['prefix' => 'admin', 'middleware' => 'isadmin'], function () {
    Route::get('list_user', 'AdminController@getListUser')->name('admin.user.list');
    Route::post('notify', 'AdminController@createNotify')->name('notify');
    Route::get('create_subject', 'AdminController@create')->name('add_subject');
    Route::post('create', 'AdminController@store')->name('create_subject');
    Route::get('list_subject', 'AdminController@list_subject');
    Route::get('list_student_in_subject', 'AdminController@getListStudentClass');
    Route::delete('/{user_id}', 'AdminController@destroy')->name('destroy');
    Route::post('add_student', 'AdminController@add_student')->name('add_student');
    Route::get('edit_score/{user_id}', 'AdminController@getEdit_score');
    Route::post('edit_score/{user_id}', 'AdminController@edit_score')->name('edit_score');
    Route::get('edit_rate/{user_id}', 'AdminController@getEdit_rate');
    Route::post('edit_rate/{user_id}', 'AdminController@edit_rate')->name('edit_rate');

    Route::get('add_score/{user_id}', 'AdminController@getAdd_score');
    Route::post('add_score/{user_id}', 'AdminController@add_score')->name('add_score');
    Route::get('add_rate/{user_id}', 'AdminController@getAdd_rate');
    Route::post('add_rate/{user_id}', 'AdminController@add_rate')->name('add_rate');
});