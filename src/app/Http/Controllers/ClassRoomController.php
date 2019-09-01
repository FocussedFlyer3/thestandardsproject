<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller {

    public function getStudents ($classID) {

        // TODO get all user (students) from this class
        return response($classID, Response::HTTP_OK);
    }
}

