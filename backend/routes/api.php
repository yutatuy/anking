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
