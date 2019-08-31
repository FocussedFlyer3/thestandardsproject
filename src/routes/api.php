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

// get all students in classroom API
Route::get('/classroom/{id}', 'ClassRoomController@getStudents');
