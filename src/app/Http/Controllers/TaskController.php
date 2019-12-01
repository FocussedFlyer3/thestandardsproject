<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Task;
use App\User;
use App\TaskUser;
use Auth;

class TaskController extends Controller
{   
    /* 
    |--------------------------------------------------------------------------
    | Task Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for assigning and obtain task assigned to users.
    |
    */

    /**
     * Assign task to a group of users
     * @param $userID is the assignor id
     * @param $taskID is the task assignor selected to assign
     * @param $request is a json body containing assignee ids to assigned to
     *
     * @return HTTP response //TODO
     */
    public function assignTask($userID, $taskID, Request $request) {
        $data = json_decode($request->getContent(), true);
        $classID = $data['task']['class_id'];
        $students= $data['task']['students_id'];

        try {
            foreach ($students as $studentID){ 

                // assign task to user 
                $user = User::find($studentID);
                $user->tasks()->attach($taskID,['assigned_by_id' => $userID, 'status' => 0]);
            }
        } catch (\Illuminate\Database\QueryException $e){
            $error = [
                'code' => 403,
                'message' => 'Error: duplicate assignment detected!'
            ];
            Log::info('Assign Task');
            Log::info('Assignor ID: '.$userID);
            Log::info('Task ID: '.$taskID);
            Log::info('Post data: '.json_encode($data));
            Log::error($e);

            return response($error, Response::HTTP_BAD_REQUEST);
        } catch (Exception $e) {
            $error = [
                'code' => 400,
                'message' => 'Opps! Looks like something went wrong, try again later!'
            ];
            Log::info('Assign Task');
            Log::info('Assignor ID: '.$userID);
            Log::info('Task ID: '.$taskID);
            Log::info('Post data: '.json_encode($data));
            Log::error($e);

            return response($error, Response::HTTP_BAD_REQUEST);
        }
        $response = [
            'code' => 200,
            'messsage' => 'Task successfully assigned'
        ];
        
        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }

    /**
     * Obtain tasks assigned to a user
     * @param $userID is the assignor id
     *
     * @return HTTP response
     */
    public function getTasks($userID) {
        $user = User::with('tasks.scores')->find($userID);

        if ($user->role == 0) {                      // student
            $tasks = $user->tasks;
            foreach ($tasks as $index => $task) {
                $scores = $task->scores;
                foreach ($scores as $score) {
                    if ($score['user_id'] == $userID) {
                        $score = $score->makeHidden(['user_id']);
                        $tasks[$index]->setAttribute('scoreInfo', $score);
                        $tasks[$index]->setAttribute('status', $task->pivot->status);
                        break;
                    }
                }
            }
    
            $tasks = $tasks->makeHidden(['scores']);
            $response = [
                'tasks' => $tasks
            ];
        } else if ($user->role == 1) {               // teacher
            
            $tasks = TaskUser::all()->where('assigned_by_id', $userID);
            info(json_encode($tasks));
            foreach($tasks as $index => $task ) {
                $tasks[$index]->makeHidden(['assigned_by_id']);
                $tasks[$index]['task_details'] = Task::find($tasks[$index]['task_id']);
                $tasks[$index]['user_details'] = User::find($tasks[$index]['user_id']);
            }

            $response = [
                'tasks' => $tasks
            ];
        }


        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }

    /**
     * Remove a task assigned to a user
     * @param $userID is the assignor id
     * @param $taskID is the task id to be removed from user
     *
     * @return HTTP response
     */
    public function removeTask($userID, $taskID) {
        $user = User::with('tasks')->find($userID);
        $user->tasks()->detach($taskID,['assigned_by_id' => $userID]);
    }

}
