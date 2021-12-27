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

Route::group(['prefix' => '/task'], function () {
    Route::get('/', 'Front\Task\TaskController@index')->name('task.index');
    Route::post('/', 'Front\Task\TaskController@create')->name('task.create');
    Route::get('/{id}', 'Front\Task\TaskController@show')->name('task.show');
    Route::post('/{id}', 'Front\Task\TaskController@update')->name('task.update');
    Route::post('/delete/{id}', 'Front\Task\TaskController@delete')->name('task.delete');
});
