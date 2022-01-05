<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Front\User\UserController@login');
    Route::post('create', 'Front\User\UserController@create');
});

Route::group([
    'prefix' => 'auth',
    'middleware' => 'auth:api'
], function () {
    Route::post('logout', 'Front\User\UserController@logout');
    Route::post('refresh', 'Front\User\UserController@refresh');
    Route::get('me', 'Front\User\UserController@me');
});

Route::group([
    'prefix' => 'wordbook',
    'middleware' => 'auth:api'
], function () {
    Route::get('fetch', 'Front\Wordbook\WordbookController@fetch');
    Route::get('fetchAll', 'Front\Wordbook\WordbookController@fetchAll');
    Route::post('create', 'Front\Wordbook\WordbookController@create');
    Route::post('update', 'Front\Wordbook\WordbookController@update');
    Route::post('delete', 'Front\Wordbook\WordbookController@delete');
});

Route::group([
    'prefix' => 'word',
    'middleware' => 'auth:api'
], function () {
    Route::post('create', 'Front\Word\WordController@create');
    Route::get('fetchByWordbookId', 'Front\Word\WordController@fetchByWordbookId');
    Route::get('fetch', 'Front\Word\WordController@fetch');
    Route::post('update', 'Front\Word\WordController@update');
    Route::post('delete', 'Front\Word\WordController@delete');
});

Route::group([
    'prefix' => 'userPlay',
    'middleware' => 'auth:api'
], function () {
    Route::post('create', 'Front\UserPlay\UserPlayController@create');
    Route::get('ranking', 'Front\UserPlay\UserPlayController@ranking');
});

