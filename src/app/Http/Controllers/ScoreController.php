<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\TaskController;
use App\Score;
use App\User;
use App\Record;
use App\Task;
use Auth;

class ScoreController extends Controller
{ 

    /**
     * Add/update score to a task
     * @param $userID is the assignor id
     * @param $taskID is the task id assigned
     * @param $request is a json body containing score for that task
     *
     * @return HTTP response with status
     */
    public function addScore ($userID, $taskID, Request $request) {
        $data = json_decode($request->getContent(), true);

        // score does not exist in POST body content
        if (!isset($data['scoreInfo']['score']) && !isset($data['scoreInfo']['class_id']) && isset($data['scoreInfo']['records'])) {
            $error = [
                'error' => [
                    'message' => 'BAD REQUEST: could not find KEY (class_id or score or record) in json body',
                    'code' => 400
                ]
            ];
            Log::info('BAD REQUEST: json key not found: '.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        //check if there is a score assigned already
        $user = User::find($userID);
        $pivotData = $user->tasks()->where('task_id', $taskID)->get();
        $score_id = $pivotData[0]->pivot->score_id;

        // update existing score if exist
        if ($score_id != NULL) {
            try {
                Score::where('score_id', $score_id)->update(['score'=> $data['scoreInfo']['score']]);

                // update existing recordings
                $score = Score::find($score_id);
                $recordedModule = [
                    'records' => $data['scoreInfo']['records']
                ];
                $score->records()->update(['module_records' => json_encode($recordedModule)]);
     
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

            try {
                // create & insert a score
                $score = new Score;
                $score['user_id'] = $userID;
                $score['score'] = $data['scoreInfo']['score'];
                $score['class_id'] = $data['scoreInfo']['class_id'];
                $score->save();

                // update task_user to new score id
                // default called to this API updates status to '2' as done
                $currentTask = Task::find($taskID);
                $currentTask->users()->updateExistingPivot($taskID, ['score_id' => $score['score_id'], 'status' => 2]);

                // insert recordings of students answers, quiz scores and game scores
                $record = new Record;
                $recordedModule = [
                    'records' => $data['scoreInfo']['records']
                ];
                $record['module_records'] = json_encode($recordedModule);
                $record->save();

                $record->scores()->attach($score['score_id'], [ 'record_id' => $record['id']]);    
    
            } catch (Exception $e) {
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
                'score' => $score
            ];
            
            $response = json_encode($response);
            return response($response, Response::HTTP_OK);
        }
    }
}
