<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Log;

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
     * Insert new user on sign up
     *
     * @return HTTP response with user's account info
     */
    public function signUp(Request $request) {
        $data = json_decode($request->getContent(), true);
        $userInfo = $data['account'];

        try {
            // create new user instance
            $user = new User;
            $user->name = $userInfo['name'];
            $user->username = $userInfo['username'];
            $user->email = $userInfo['email'];
            $user->password = Hash::make($userInfo['password']);
            $user->api_token = str_random(60);
            $user->role = $userInfo['role'];
            $user->save();

        } catch (Exception $e) {
            $error = [
                'code' => 400,
                'message' => 'Opps! Looks like something went wrong, try again later!'
            ];
            Log::info('Sign Up Error!');
            Log::info('Post data: '.json_encode($data));
            Log::error($e);

            return response($error, Response::HTTP_BAD_REQUEST);
        }

        // get inserted user
        $user->makeVisible(['api_token']);

        $response = [
            'account' => $user
        ];
        $response = json_encode($response);
        
        return response($response, Response::HTTP_OK);
    }

    /**
     * Authenticate user on email login
     *
     * @return HTTP response with user's account info
     */
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
