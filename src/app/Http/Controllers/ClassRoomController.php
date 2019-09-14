<?php

namespace App\Http\Controllers;

use App\Classes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller {

    public function getStudents ($classID) {
        // obtain class info
        $class = Classes::find($classID);

        //get students scores
        $scores = $this->getScores($class);

        // hide redundant attributes
        foreach($class->users as $user){
            $user->makeHidden(['role']);
        }
        $data = $class;

        // response JSON
        $classroom = [
            'classroom' => [
                'details' => $data,
                'scores' => $scores
            ]
        ];
        $response = json_encode($classroom);

        return response($response, Response::HTTP_OK);
    }

    private function getScores ($class) {
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
            $currentUser = User::find($index);
            foreach ($scores as $score) {
                $totalScore += $score->score;
            }

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
}

