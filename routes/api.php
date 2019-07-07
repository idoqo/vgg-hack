<?php

use Illuminate\Http\Request;

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
Route::post('login', 'Api\AuthController@login');
Route::post('signup', 'Api\AuthController@signup');

Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function() {
    Route::get('profile', 'Api\UserController@profile');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
