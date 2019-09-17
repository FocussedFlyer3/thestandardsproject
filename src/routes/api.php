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


// API call without Authorization header
Route::group(['prefix' => 'v1', 'middleware' => 'web'], function () {

    // get user account's info (token)
    Route::get('/account', 'AccountController@getAccountInfo');
});

// API call with Authorization header
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    // get all classrooms
    Route::get('{userID}/classroom', 'ClassRoomController@getClasses');

    // get classroom details
    Route::get('{userID}/classroom/{classID}', 'ClassRoomController@getClassDetails');
});

