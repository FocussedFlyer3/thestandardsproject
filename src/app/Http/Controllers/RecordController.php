<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Score;
use App\User;
use App\ScoreRecord;
use App\Record;
use Log;

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

        $user = User::find($userID);

        //check role 
        if (($user->role) == 0) {       // student
            $pivotData = $user->tasks()->where('task_id', $taskID)->get();

            // check if task exist
            if (count($pivotData) > 0) {
                $score_id = $pivotData[0]->pivot->score_id;
                $record = Score::with('records')->find($score_id);
                //  $userRecord = json_decode($record['records'], true);    # statement to spefically extract user's records
    
            } else {
                $error = [
                    'code' => 400,
                    'message' => 'Error: Could not find task id `'.$taskID.'` for user id `'.$userID.'`'
                ];
                Log::info('WARNING: User failed to get task record!');
                Log::info('BAD REQUEST: user id `('.$userID.')` and task id `('.$taskID.')`');
    
                return response($error, Response::HTTP_BAD_REQUEST);
            }
    
            $response = [
                'record' => $record
            ];
            
        } else if (($user->role) == 1) {    // teacher
            // find record id using score id ($taskID)
            $recordID = ScoreRecord::where('score_id', $taskID)->first();

            // get records 
            $records = Record::find($recordID->record_id);

            // get scores
            $score = Score::find($taskID)->first();

            $response = [
                'record' => [
                    'score' => $score->score,
                    'details' => $records
                ]
            ];
        }
        
        $response = json_encode($response);
        return response($response, Response::HTTP_OK);
    }
}
