<?php

namespace App\Http\Controllers;

use App\Classes;
use App\User;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DateTime;
use Log;

class ClassRoomController extends Controller {
     /* 
    |--------------------------------------------------------------------------
    | Class Room Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for obtaining, creating and manipulating
    | classes info as well as assigning a classroom to a user
    |
    */

    /**
     * Get all classrooms available
     * 
     */
    public function getAllClasses() {
        $classes = Classes::all();

        $response = [
            'classroom' => $classes
        ];
        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }

    /**
     * Create new classroom
     * @param $userID id of the user creating new classroom
     * @param $request containing new classroom info to be created
     * @return HTTP response status with new classroom info
     */
    public function newClass ($userID, Request $request) {
        $data = json_decode($request->getContent(), true);
        $classInfo = $data['classroom'];

        // check for starts_at and ends_at format (HH:MM:SS)
        if (array_key_exists("starts_at",$classInfo) && array_key_exists("ends_at",$classInfo) ) {
            if ((DateTime::createFromFormat('H:i:s', $classInfo['starts_at']) || DateTime::createFromFormat('H:i:s', $classInfo['ends_at'])) == FALSE) {
                $error = [
                    'code' => 400,
                    'message' => 'Time format for `starts_at` and `ends_at` should be <HH:MM:SS> in string!'
                ];
                Log::info('Invalid time format in creating new classroom Error!');
                Log::info('Post data: '.json_encode($data));
    
                return response($error, Response::HTTP_BAD_REQUEST);
            }
        } else {
            $error = [
                'code' => 400,
                'message' => 'Missing `starts_at` and `ends_at` key in JSON body!'
            ];
            Log::info('Missing key in creating new classroom Error!');
            Log::info('Post data: '.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        try {
            // create new class instance
            $class = new Classes;
            $class->grade = $classInfo['grade'];
            $class->subject = $classInfo['subject'];
            $class->teacher_id = $userID;
            $class->starts_at = $classInfo['starts_at'];
            $class->ends_at = $classInfo['ends_at'];
            $class->school = $classInfo['school'];
            $class->room = $classInfo['room'];
            $class->save();

        } catch (Exception $e) {
            $error = [
                'code' => 400,
                'message' => 'Opps! Looks like something went wrong, try again later!'
            ];
            Log::info('Create new classroom Error!');
            Log::info('Post data: '.json_encode($data));
            Log::error($e);

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        $response = [
            'classroom' => $class
        ];
        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }

    /**
     * Update a current classroom
     * @param $userID id of the user updating its classroom
     * @param $classID id of the class to update
     * @param $request containing info of classroom to be update
     * @return HTTP response status of update
    */
    public function updateClassInfo($userID, $classID, Request $request) {
        $data = json_decode($request->getContent(), true);
        $classInfo =  $data['classroom'];

        if ($classInfo == NULL) {
            $error = [
                'error' => [
                    'message' => '`classroom` key not found in JSON body',
                    'code' => 400
                ]
            ];
            Log::info('Updating classroom info failed!');
            Log::info('JSON body: '.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        // update class info
        try{
            // update class info
            $userClass = Classes::where('teacher_id', $userID)
                                ->where('class_id', $classID)
                                ->update([
                                    'grade' => $classInfo['grade'],
                                    'subject' => $classInfo['subject'],
                                    'teacher_id' => $userID,
                                    'starts_at' => $classInfo['starts_at'],
                                    'ends_at' => $classInfo['ends_at'],
                                    'school' => $classInfo['school'],
                                    'room' => $classInfo['room']
                                ]);

            // if user class cannot be find
            if ($userClass == NULL) {
                $error = [
                    'error' => [
                        'message' => 'classID `'.$classID.'` is not assigned to userID `'.$userID.'`. Permission to edit is denied!',
                        'code' => 405
                    ]
                ];
                Log::info('Updating classroom info failed!');
                Log::info('classID `'.$classID.'` cannot be found for userID `'.$userID.'`');
                Log::info('JSON body: '.json_encode($data));

                return response($error, Response::HTTP_BAD_REQUEST);
            }

        } catch (Exception $e){
            $error = [
                'code' => 400,
                'message' => 'Opps! Looks like something went wrong, try again later!'
            ];
            Log::info('Error when update user('.$userID.') info!');
            Log::info('Post data: '.json_encode($data));
            Log::error($e);
        
            return response($error, Response::HTTP_BAD_REQUEST);
        }

        $response = [
            'code' => 200,
            'messsage' => 'Classroom\'s info successfully updated!'
        ];
        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);

    }

    /**
     * Assign classroom to a user (userID)
     * @param $userID is the user currently assigning class to itself
     * @param $request contains classes id to be assigned to user
     * @return HTTP response status
     */
    public function assignClass ($userID, Request $request) {
        $data = json_decode($request->getContent(), true);
        $classes =  $data['classroom']['id'];

        if ($classes == NULL) {
            $error = [
                'error' => [
                    'message' => 'Classroom id not found in JSON body',
                    'code' => 400
                ]
            ];
            Log::info('Classroom assign failed!');
            Log::info('JSON body: '.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        } 

        // find user role 
        $user = User::find($userID);

        // check user role
        switch ($user->role) {
            case 0: 
                // students
                foreach ($classes as $class) {
                    $user->classes()->attach($class);
                }
                break;
            case 1:
                // teachers
                // update teacher id in class
                foreach ($classes as $class) {
                    Classes::where('class_id', $class)->update(['teacher_id' => $userID]);
                }
                break;
        }

        $response = [
            'code' => 200,
            'messsage' => 'Classroom successfully assigned'
        ];
        
        $response = json_encode($response);
        return response($response, Response::HTTP_OK);
    }

    /**
     * Get all user's classes enrolled in
     *
     * @return HTTP response with user's classes
     */
    public function getClasses ($userID) {
        // find all user's clases
        $user = User::with('classes')->find($userID);

        // invalid user
        if ($user == null) {
            $error = [
                'error' => [
                    'message' => 'User not found for user id: '.$userID,
                    'code' => 400
                ]
            ];
            return response($error, Response::HTTP_BAD_REQUEST);
        }

        // Check user role
        // 0 - student
        // 1 - teacher
        switch ($user->role) {
            case 0: $classrooms = $user->classes; break;
            case 1: $classrooms = Classes::where('teacher_id', $userID)->get(); break;
            default: $classrooms = null;
        }

        // response JSON
        $response = [
            'classes' => [
                'classrooms' => $classrooms,
                'notifications' => [
                    'total' => 0,
                    'items' => []
                ]
            ]
        ];
        $response = json_encode($response);

        return response($response, Response::HTTP_OK);
    }

    /**
     * Get a users score details
     * @param $userID is user's id in system
     * @param $classID is the class's id in system
     * @param $benchmark is the benchmark (Proficient, Almost Proficient, Not Proficient)
     * Details depends on role:
     *  1) Student
     *      - get only user scores details on each module
     * 
     *  2) Teacher 
     *      - all students score details on each module
     *
     * @return HTTP response with user's class details
     */
    public function getScoreDetails ($userID, $classID, $benchmark) {

        $user = User::find($userID);

        // check user's role
        switch ($user->role) {
            case 0: $role = 0; break;   // student
            case 1: $role = 1; break;   // teacher
            default: $role = null;
        }

        // get all modules and scores for this class
        $modules = Classes::with('modules.scores.users')->find($classID);
        $modules->makeHidden(['starts_at', 'ends_at', 'room', 'teacher_id']);
        //  info($modules);

        // check proficient level
        switch ($benchmark) {
            case 'p': $level = 0; break;    // proficient 
            case 'ap': $level = 1; break;   // almost proficient 
            case 'np': $level = 2; break;   // not proficient 
            default: $level = null;
        }

        // filter students base on levels specified
        $result = $this->filterResult($modules, $level, $role, $user);

        $response = json_encode($result);

        return response($response, Response::HTTP_OK);
    }

    /**
     * Local funciton to filter results base on level specified
     * @param $modules is an array of targets to be achieved in class
     * @param $level is the benchmark (Proficient, Almost Proficient, Not Proficient)
     * 
     * @return filtered JSON result
     */
    private function filterResult ($modules, $level, $role, $user) {

        if ($role == 0) {           // student
            $allStandards = $this->getScore($user);
        } else if ($role == 1) {    // teacher
            $allStandards = $this->getAllScores($modules);
        }

        switch ($level){
            case 0: $students = $allStandards['proficient']; break;
            case 1: $students = $allStandards['almostProficient']; break;
            case 2: $students = $allStandards['notProficient']; break;
        }

        $count = 0;
        foreach($students['users'] as $student){
            $ids[$count++] = $student['id'];
        }

        $modulesString = json_decode(json_encode($modules));
        foreach($modulesString->modules as $index => $module){
            $temp = [];
            $count = 0;
            foreach($module->scores as $score){

                if (in_array(json_decode($score->user_id,true), $ids, true)) {
                    $temp[$count++] = $score;
                }
            }
            $module->scores = $temp;

        }

        return $modulesString;
    }

    /**
     * Get a user class details
     * Details depends on role:
     *  1) Student
     *      - all scores obtain in the class
     * 
     *  2) Teacher 
     *      - all class details (time, venue and so on)
     *      - all of student scores 
     *
     * @return HTTP response with user's class details
     */
    public function getClassDetails ($userID, $classID) {
        // check user's role
        $user = User::find($userID);
        switch ($user->role) {
            case 0: $role = 0; break;   // student
            case 1: $role = 1; break;   // teacher
            default: $role = null;
        }

        // obtain class info
        $class = Classes::with('scores.users')->find($classID);
        if ($class == null) {
            $error = [
                'error' => [
                    'message' => 'Class id ('.$classID.') not found for user id: '.$userID,
                    'code' => 400
                ]
            ];
            return response($error, Response::HTTP_BAD_REQUEST);
        }

        // hide redundant attributes
        $details = $class->makeHidden(['scores']);

        // get students scores
        if ($role == 0) {
            $scores = $this->getScore($user); // get a student score
        } else if ($role == 1) {
            $scores = $this->getAllScores($class, $role);  // get all student scores
        }

        // response JSON
        $classroom = [
            'classroom' => [
                'details' => $details,
                'scores' => $scores
            ]
        ];
        $response = json_encode($classroom);

        return response($response, Response::HTTP_OK);
    }

    /**
     * Local funciton to obtain and compute class scores
     *
     * @return JSON encoded with all the scores details
     */
    private function getAllScores ($class) {
        $proficient = 0;
        $proficientStudents = [];
        $almostProficient = 0;
        $almostProficientStudents = [];
        $notProficient = 0;
        $notProficientStudents = [];

        // get all students scores
        $studentScores = $class->scores->groupBy('user_id');

        // compute scores
        foreach ($studentScores as $index => $scores) {
            $totalScore = 0;
            $currentUser = $scores->pluck('users')->unique()[0];     // get current users details
            foreach ($scores as $score) {
                $totalScore += $score->score;
            }

            // insert total scores into users details
            $currentUser->setAttribute('totalScore', $totalScore);

            switch (true) {
                case $totalScore < 40.00:
                    $notProficientStudents[$notProficient] = $currentUser;
                    $notProficient++;
                    break;
                
                case $totalScore < 75.00:
                    $almostProficientStudents[$almostProficient] = $currentUser;
                    $almostProficient++;
                    break;
                
                case $totalScore > 75.00:
                    $proficientStudents[$proficient] = $currentUser;
                    $proficient++;
                    break;
            }
        }

        $result = [
            'proficient' => [
                'count' => $proficient,
                'users' => $proficientStudents
            ],
            'almostProficient' => [
                'count' => $almostProficient,
                'users' => $almostProficientStudents
            ],
            'notProficient' => [
                'count' => $notProficient,
                'users' => $notProficientStudents
            ]
        ];

        return $result;
    }

    /**
     * Local funciton to obtain and compute a student class score
     *
     * @return JSON encoded with student scores details in this class
     */
    private function getScore ($user) {
        $proeficent = 0;
        $proeficentStudents = [];
        $almostProeficent = 0;
        $almostProeficentStudents = [];
        $notProeficent = 0;
        $notProeficentStudents = [];

        // get this student scores
        $userScores = $user->scores;

        // compute scores
        $totalScore = 0;
        foreach ($userScores as $index => $scores) {
            $totalScore += $scores->score;
        }

        // insert total scores into users details
        $user->setAttribute('totalScore', $totalScore);

        switch (true) {
            case $totalScore < 40.00:
                $notProeficentStudents[$notProeficent] = $user;
                $notProeficent++;
                break;
                
            case $totalScore < 75.00:
                $almostProeficentStudents[$almostProeficent] = $user;
                $almostProeficent++;
                break;
                
            case $totalScore > 75.00:
                $proeficentStudents[$proeficent] = $user;
                $proeficent++;
                break;
        }

        $result = [
            'proficient' => [
                'count' => $proeficent,
                'users' => $proeficentStudents
            ],
            'almostProficient' => [
                'count' => $almostProeficent,
                'users' => $almostProeficentStudents
            ],
            'notProficient' => [
                'count' => $notProeficent,
                'users' => $notProeficentStudents
            ]
        ];

        return $result;
    }
}

