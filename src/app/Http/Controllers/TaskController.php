<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Task;
use App\User;
use App\TaskUser;
use App\Score;
use App\Module;
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
     * To get all tasks available based on target (module_id)
     * 
     * @return HTTP response with all tasks available
     */
    public function getAllTasks ($targetID) {
        $task = Task::where('module_id', $targetID)->get();
        $task->makeHidden(['module_id']);

        // get module details
        $module = Module::find($targetID);

        $response = [
            'target' => $module,
            'tasks' => $task
        ];

        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }

    /**
     * Assign task to a group of users
     * @param $userID is the assignor id
     * @param $taskID is the task assignor selected to assign
     * @param $request is a json body containing assignee ids to assigned to
     *
     * @return HTTP response 
     */
    public function assignTask($userID, $taskID, Request $request) {
        $data = json_decode($request->getContent(), true);
        $classID = $data['task']['class_id'];
        $students = $data['task']['students_id'];
        $dueDate = $data['task']['due_date'];

        try {
            foreach ($students as $studentID){ 
                // insert score
                $score = new Score;
                $score->user_id = $studentID;
                $score->score = 0;
                $score->class_id = $classID;
                $score->save();

                // assign task to user 
                $user = User::find($studentID);
                $user->tasks()->attach($taskID,['score_id' => $score->score_id, 'assigned_by_id' => $userID, 'status' => 0, 'due_date' => $dueDate]);
            }
        } catch (\Illuminate\Database\QueryException $e){
            $error = [
                'error' => [
                    'code' => 403,
                    'message' => 'Error: duplicate assignment detected!'
                ]
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
            $taskCount = 0;
            foreach ($tasks as $index => $task) {
                $scores = $task->scores;
                foreach ($scores as $score) {
                    if ($score['user_id'] == $userID) {
                        // find state score related to this task module (target)
                        $stateScore = json_decode(Module::with('standardizeds')->find($tasks[$index]->module_id)->standardizeds->where('user_id', $userID), true);
                        $stateScore = reset($stateScore);
                        
                        // insert state score inside scoreInfo
                        $score = $score->makeHidden(['user_id']);
                        $score->setAttribute('standardized_score', $stateScore['score']);

                        // insert attributes into task
                        $tasks[$index]->setAttribute('scoreInfo', $score);
                        $tasks[$index]->setAttribute('status', $task->pivot->status);
                        $tasks[$index]->setAttribute('due_date', $task->pivot->due_date);
                        $taskCount++;
                        break;
                    }
                }
            }
    
            $tasks = $tasks->makeHidden(['scores']);
            $response = [
                'tasks' => [
                    'userInfo' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'username' => $user->username,
                        'email' => $user->email
                    ],
                    'count' => $taskCount,
                    'details' => $tasks
                ]
            ];
        } else if ($user->role == 1) {               // teacher
            $tempTasks = [];
            $taskCount = 0;
            $ids = [];
            $tasks = TaskUser::all()->where('assigned_by_id', $userID);
            foreach($tasks as $index => $task) {
                $tasks[$index]->makeHidden(['assigned_by_id']);
                $currentStudent = $task->user_id;

                if (!in_array(json_encode($currentStudent, true), $ids)) {
                    // get current user details
                    $currentUser = User::with('tasks')->find($tasks[$index]['user_id']);


                    // get all tasks details about this user
                    $done = 0;
                    $inProgress = 0;
                    $notStarted = 0;
                    foreach($currentUser->tasks as $currentTask) {
                        if ($currentTask->pivot->status == 2) {
                            $done++;
                        } else if ($currentTask->pivot->status == 1) {
                            $inProgress++;
                        } else if ($currentTask->pivot->status == 0) {
                            $notStarted++;
                        }
                    } 

                    $summary = [
                        'completed' => $done,
                        'inProgress' => $inProgress,
                        'notCompleted' => $notStarted
                    ];

                    $currentUser->makeHidden(['tasks']);
                    $currentUser->setAttribute('summary', $summary);
                    $tasks[$index]['user_details'] = $currentUser;
                    $ids[$taskCount] = $tasks[$index]->user_id;
                    $tempTasks[$taskCount++] = $tasks[$index];
                }

            }

            $response = [
                'tasks' => [
                    'count' => $taskCount,
                    'students' => $tempTasks
                ]
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

    /**
     * Update status of a task
     * @param $userID is the user's id
     * @param $taskID is the task's id
     */
    public function updateStatus($userID, $taskID) {
        $user = User::with('tasks')->find($userID);

        // check if task exist
        $task = $user->tasks->where('id', $taskID)->first();
        if ($task) {
            $currentTask = Task::find($taskID);
            $currentTask->users()->updateExistingPivot($userID, ['status' => 1]);

            $response = [
                'code' => 200,
                'messsage' => 'Task successfully updated!'
            ];

            return response($response, Response::HTTP_OK);
        } else {
            $error = [
                'code' => 403,
                'message' => 'Error: task id `('.$taskID.')` could not be found for user id `('.$userID.')`'
            ];

            return response($error,Response::HTTP_BAD_REQUEST);
        }
    }

}
