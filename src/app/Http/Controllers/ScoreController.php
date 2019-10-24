<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\TaskController;
use App\Score;
use Auth;

class ScoreController extends Controller
{   
    /**
     * Add a score base on a task
     * @param $userID is the assignor id
     * @param $taskID is the task id to be removed from user
     * @param $request is a json body containing score for that task
     *
     * @return HTTP response //TODO
     */
    public function addScore ($userID, $taskID, Request $request) {
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
            $score->save();
        } catch (Exception $e) {
            $error = [
                'code' => 400,
                'message' => 'Opps! Looks like something went wrong, try again later!'
            ];
            Log::info('BAD REQUEST: '.json_encode($data));
            Log::error($e);

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        // TODO: flag task as done

        $response = [
            'code' => 200,
            'messsage' => 'Score successfully updated!'
        ];
        
        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }
}
