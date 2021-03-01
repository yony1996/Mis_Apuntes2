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

Route::get('/','TaskController@index')->name('tareas');

/** crud de Asignaturas */
Route::get('/courses','CourseController@index')->name('asignatura');
Route::get('/courses/create','CourseController@create')->name('asignatura.create');
Route::get('/courses/{course}/edit','CourseController@edit')->name('asignatura.edit');
Route::post('/courses','CourseController@store')->name('asignatura.store');
Route::put('/courses/{course}','CourseController@update')->name('asignatura.update');
Route::delete('/courses/{course}','CourseController@destroy')->name('asignatura.destroy');
/**crud tareas */

Route::get('/tasks/create','TaskController@create')->name('tareas.create');
Route::get('/tasks/{task}/edit','TaskController@edit')->name('tareas.edit');
Route::post('/tasks','TaskController@store')->name('tareas.store');
Route::put('/tasks/{task}','TaskController@update')->name('tareas.update');
Route::delete('/tasks/{task}','TaskController@destroy')->name('tareas.destroy');
/** status */
Route::put('/status/{task}','TaskController@updateStatus')->name('tareas.status');
Auth::routes();

/**perfil de usuario */
Route::get('/users/edit','UserController@edit')->name('perfil.edit');
Route::put('/users/user','UserController@update')->name('perfil.update');
