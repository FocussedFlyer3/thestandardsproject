<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller {

    public function getStudents ($classID) {
        info('in controller with class id :' . $classID);

        return response($classID, Response::HTTP_OK);
    }
}

