<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Score;
use App\User;

class RecordController extends Controller
{
     /* 
    |--------------------------------------------------------------------------
    | Record Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for obtaining, creating and manipulating
    | recorded module info
    |
    */

    /**
     * Obtain a record 
     * @param $userID id of the user creating new classroom
     * @param $request containing new classroom info to be created
     * @return HTTP response status with new classroom info
     */
    public function getRecord($userID, $taskID) {

        // check if task exist
        $user = User::find($userID);
        $pivotData = $user->tasks()->where('task_id', $taskID)->get();

        if ($pivotData != NULL) {
            $score_id = $pivotData[0]->pivot->score_id;
            $record = Score::with('records')->find($score_id);
            //  $userRecord = json_decode($record['records'], true);    # statement to spefically extract user's records
        } else {
            $error = [
                'code' => 400,
                'message' => 'Error: task id `'.$taskID.'` do not exist for user id `'.$userID.'`'
            ];
            Log::info('WARNING: User failed to get task record!');
            Log::info('BAD REQUEST: '.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        $response = [
            'record' => $record
        ];
        
        $response = json_encode($response);
        return response($response, Response::HTTP_OK);
    }
}
