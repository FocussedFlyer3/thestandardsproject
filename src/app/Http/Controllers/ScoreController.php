<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\TaskController;
use App\Score;
use App\User;
use Auth;

class ScoreController extends Controller
{   
    /**
     * Update a current score
     * @param $userID is the assignor id
     * @param $request is a json body containing score for that task
     *
     * @return HTTP response with status
     */
    public function updateScore ($userID, Request $request) {
        $data = json_decode($request->getContent(), true);

        // score does not exist in POST body content
        if (!isset($data['scoreInfo']['score_id'])) {
            $error = [
                'error' => [
                    'message' => 'BAD REQUEST: could not find KEY (score_id) in json body',
                    'code' => 400
                ]
            ];
            Log::info('BAD REQUEST: json key not found \n'.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        $score = Score::find($data['scoreInfo']['score_id']);
        if (!$score) {
            $error = [
                'error' => [
                    'message' => 'BAD REQUEST: score id '.$data['scoreInfo']['score_id'].' do not exist!'  ,
                    'code' => 400
                ]
            ];
            Log::info('BAD REQUEST: score id do not exist\n'.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        try {
            $score->score = $data['scoreInfo']['score'];

        } catch (Exception $e) {
            $error = [
                'code' => 400,
                'message' => 'Opps! Looks like something went wrong, try again later!'
            ];
            Log::info('BAD REQUEST: '.json_encode($data));
            Log::error($e);

            return response($error, Response::HTTP_BAD_REQUEST);
        }
        $score->save();
        $response = [
            'code' => 200,
            'messsage' => 'Score successfully updated!'
        ];
        
        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }

    /**
     * Add score to a task
     * @param $userID is the assignor id
     * @param $taskID is the task id assigned
     * @param $request is a json body containing score for that task
     *
     * @return HTTP response with status
     */
    public function addScore ($userID, $taskID, Request $request) {
        $data = json_decode($request->getContent(), true);

        // score does not exist in POST body content
        if (!isset($data['scoreInfo']['score']) && !isset($data['scoreInfo']['class_id'])) {
            $error = [
                'error' => [
                    'message' => 'BAD REQUEST: could not find KEY (score_id) in json body',
                    'code' => 400
                ]
            ];
            Log::info('BAD REQUEST: json key not found \n'.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        //check if there is a score assigned already
        $user = User::find($userID);
        $pivotData = $user->tasks()->where('task_id', $taskID)->get();
        $score_id = $pivotData[0]->pivot->score_id;

        // update score if exist
        if ($score_id != NULL) {
            try {
                Score::where('score_id', $score_id)->update(['score'=> $data['scoreInfo']['score']]);
            } catch (Exception $e){
                $error = [
                    'code' => 400,
                    'message' => 'Opps! Looks like something went wrong, try again later!'
                ];
                Log::info('BAD REQUEST: '.json_encode($data));
                Log::error($e);
    
                return response($error, Response::HTTP_BAD_REQUEST);
            }

            $response = [
                'code' => 200,
                'messsage' => 'Score successfully updated!',
                'score' => $data['scoreInfo']['score']
            ];
            
            $response = json_encode($response);
            return response($response, Response::HTTP_OK);

        } else {
            // create & insert a score
            try {
                $score = new Score;
                $score['user_id'] = $userID;
                $score['score'] = $data['scoreInfo']['score'];
                $score['class_id'] = $data['scoreInfo']['class_id'];
    
            } catch (Exception $e) {
                $error = [
                    'code' => 400,
                    'message' => 'Opps! Looks like something went wrong, try again later!'
                ];
                Log::info('BAD REQUEST: '.json_encode($data));
                Log::error($e);
    
                return response($error, Response::HTTP_BAD_REQUEST);
            }
            $score->save();
    
            // update score_id in task_user table
            try {
                $user->tasks()->where('task_id', $taskID)->update(['score_id' => $score->score_id]);
    
            } catch (Exception $e) {
                $error = [
                    'code' => 400,
                    'message' => 'Opps! Looks like something went wrong, try again later!'
                ];
                Log::info('BAD REQUEST: '.json_encode($data));
                Log::error($e);
    
                // remove insert score
                Score::find($score->score_id)->delete();
    
                return response($error, Response::HTTP_BAD_REQUEST);
            }
    
            $response = [
                'code' => 200,
                'messsage' => 'Score successfully updated!',
                'score' => $score
            ];
            
            $response = json_encode($response);
            return response($response, Response::HTTP_OK);
        }
    }
}
