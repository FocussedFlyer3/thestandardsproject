<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class AccountController extends Controller
{
    // Get user's token
    public function getAccountInfo(Request $request) {
        $userID = $request->session()->get('ID');
        $user = User::find($userID);

        // reveal hidden attributes
        $details = $user->makeVisible(['api_token']);

        $account = [
            'account' => $user
        ];
        $response = json_encode($account);

        return response($response, Response::HTTP_OK);
    }
}
