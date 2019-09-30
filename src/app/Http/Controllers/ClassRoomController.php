<?php

namespace App\Http\Controllers;

use App\Classes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller {
     /* 
    |--------------------------------------------------------------------------
    | Class Room Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for obtaining user enrolled classes info.
    |
    */

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
        $proeficent = 0;
        $proeficentStudents = [];
        $almostProeficent = 0;
        $almostProeficentStudents = [];
        $notProeficent = 0;
        $notProeficentStudents = [];

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
                    $notProeficentStudents[$notProeficent] = $currentUser;
                    $notProeficent++;
                    break;
                
                case $totalScore < 75.00:
                    $almostProeficentStudents[$almostProeficent] = $currentUser;
                    $almostProeficent++;
                    break;
                
                case $totalScore > 75.00:
                    $proeficentStudents[$proeficent] = $currentUser;
                    $proeficent++;
                    break;
            }
        }

        $result = [
            'proeficent' => [
                'count' => $proeficent,
                'users' => $proeficentStudents
            ],
            'almostProeficent' => [
                'count' => $almostProeficent,
                'users' => $almostProeficentStudents
            ],
            'notProeficent' => [
                'count' => $notProeficent,
                'users' => $notProeficentStudents
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
            'proeficent' => [
                'count' => $proeficent,
                'users' => $proeficentStudents
            ],
            'almostProeficent' => [
                'count' => $almostProeficent,
                'users' => $almostProeficentStudents
            ],
            'notProeficent' => [
                'count' => $notProeficent,
                'users' => $notProeficentStudents
            ]
        ];

        return $result;
    }
}

