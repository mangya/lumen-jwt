<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validate($request, User::getUserRegistrationValidationRules());

        try {

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            return response()->json(['user' => $user, 'message' => 'CREATED'], Response::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json(['message' => 'User Registration Failed!'], Response::HTTP_CONFLICT);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, User::getUserLoginValidationRules());

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        return $this->respondWithToken($token);
    }

    public function mail() {
        $data = array('name'=>'John');
        Mail::send('emails.mail', $data, function($message) {
            $message->to('test@test.com', 'John')->subject('Test Mail from John');
            $message->from('test@test.com','John');
        });
        echo 'Email Sent. Check your inbox.';
    }
}