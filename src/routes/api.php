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
Route::group(['prefix' => 'v1', 'middleware' => ['web']], function () {

    # ACCOUNT API
    Route::get('/account', 'AccountController@getAccountInfo');     // get user account's info (token)
    Route::post('/account/signup', 'AccountController@signUp');     // sign up with email
    Route::post('/account/login', 'AccountController@loginEmail');  // login with email
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

    # ACCOUNT API
    Route::post('{userID}/account', 'AccountController@updateInfo');    // update account info

    # CLASSROOM API
    Route::get('classroom', 'ClassRoomController@getAllClasses');                                              // obtain all available classrooms
    Route::get('{userID}/classroom', 'ClassRoomController@getClasses');                                        // obtain user's classroom info
    Route::get('{userID}/classroom/{classID}', 'ClassRoomController@getClassDetails');                         // obtain classroom info
    Route::get('{userID}/classroom/{classID}/{benchmark}', 'ClassRoomController@getScoreDetails');             // obtain targets with proficencies
    Route::get('{userID}/classroom/{classID}/{benchmark}/{targetID}', 'ClassRoomController@getTargetDetails'); // obtain details breakdown of students' scores
    Route::post('{userID}/classroom-assign', 'ClassRoomController@assignClass');                               // assign classroom to user
    Route::post('{userID}/classroom', 'ClassRoomController@newClass');                                         // create new classroom
    Route::post('{userID}/classroom/{classID}', 'ClassRoomController@updateClassInfo');                        // update classroom info

    # TASK API
    // assign and get task
    Route::get('/tasks/{targetID}', 'TaskController@getAllTasks');           // To get all tasks
    Route::post('{userID}/assign/{taskID}', 'TaskController@assignTask');   // To assign task to a user
    Route::get('{userID}/tasks','TaskController@getTasks');                 // obtain all user's task assigned
    Route::put('{userID}/tasks/{taskID}', 'TaskController@updateStatus');   // update status of a task

    # SCORE API
    Route::post('{userID}/score/{taskID}', 'ScoreController@addScore');     // assign a score to a module

    # RECORD API
    Route::get('{userID}/record/{taskID}', 'RecordController@getRecord');  // get a assigned task record
});

