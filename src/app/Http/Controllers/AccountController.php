<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
{
    // Get user's token
    public function getToken(Request $request) {
        $token = $request->session()->get('Token');

        $account = [
            'account' => [
                'token' => $token
            ]
        ];
        $response = json_encode($account);

        return response($response, Response::HTTP_OK);
    }
}
