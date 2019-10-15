<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class AccountController extends Controller
{   
    /* 
    |--------------------------------------------------------------------------
    | Accounts Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for obtaining user's account info through email login.
    |
    */

    /**
     * Get user's token
     *
     * @return HTTP response with user's token
     */
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

    /**
     * Authenticate user on email login
     *
     * @return HTTP response with user's account info
     */
    // API on login to authenticate and obtain user info
    public function loginEmail(Request $request) {
        $data = json_decode($request->getContent(), true);

        // search for user
        $user = User::whereEmail($data['account']['email'])->first();

        // user not found (invalid)
        if ($user == NULL) {
            $error = [
                'error' => [
                    'message' => 'User not found for: '.$data['account']['email'],
                    'code' => 400
                ]
            ];
            Log::info('User failed to log in: '.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }
        
        $credentials = $data['account'];

        // password not match (invalid password)
        if (Auth::once($credentials)) {
            $user = Auth::getUser();
        } else {
            $error = [
                'error' => [
                    'message' => 'Email or Password incorrect, try again!',
                    'code' => 400
                ]
            ];
            Log::info('User failed to log in: '.json_encode($data));

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        // reveal hidden attributes 
        $details = $user->makeVisible(['api_token']);

        $account = [
            'account' => $details
        ];
        $response = json_encode($account);

        return response($response, Response::HTTP_OK);
    }
}
