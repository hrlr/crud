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

Route::get('/', 'StudentController@index');

Route::get('student', 'StudentController@index')->name('student.index');
Route::get('student/create', 'StudentController@create')->name('student.create');
Route::post('student', 'StudentController@store')->name('student.store');
Route::get('student/{student}', 'StudentController@show')->name('student.show');
Route::get('student/{student}/edit', 'StudentController@edit')->name('student.edit');
Route::put('student/{student}', 'StudentController@update')->name('student.update');
Route::delete('student/{student}', 'StudentController@destroy')->name('student.destroy');
