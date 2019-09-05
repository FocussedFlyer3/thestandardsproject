<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller {

    public function getStudents ($classID) {
        // obtain class info
        $class = Classes::find($classID);

        $classroom = [
            'classroom' => [
                'details' => $class,
                'students' => $class->users
            ]
        ];
        $response = json_encode($classroom);

        // TODO get all user (students) from this class
        return response($response, Response::HTTP_OK);
    }
}

