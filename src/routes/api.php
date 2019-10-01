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

//  verify login users (filters)
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
|--------------------------------------------------------------------------
|                   API call without Authorization header
|--------------------------------------------------------------------------
|
| Here is to register API without any authorization during call.
| API initialized here can be called without any authorization token, but
| should handle any invalid or do not exist data.
|
*/
Route::group(['prefix' => 'v1', 'middleware' => 'web'], function () {

    // get user account's info (token)
    Route::get('/account', 'AccountController@getAccountInfo');

    // login using API to authenticate user
    Route::post('/account/login', 'AccountController@loginEmail');
});

/* 
|--------------------------------------------------------------------------
|                   API call with Authorization header
|--------------------------------------------------------------------------
|
| Here is to register API with an authorization header during call.
| Authorization token (api_token) can be obtain from users table.
|
*/
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    // classrooms API
    Route::get('{userID}/classroom', 'ClassRoomController@getClasses');
    Route::get('{userID}/classroom/{classID}', 'ClassRoomController@getClassDetails');
    Route::get('{userID}/classroom/{classID}/{benchmark}', 'ClassRoomController@getScoreDetails');

});

