<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Instantiate a new UserController instance.
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], Response::HTTP_OK);
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
         return response()->json(['users' =>  $this->userService->getAll()], Response::HTTP_OK);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function get(int $id)
    {
        try {
            $user = $this->userService->getByAttributes(['id' => $id]);

            return response()->json(['user' => $user], Response::HTTP_OK);

        } catch (Exception $e) {

            return response()->json(['message' => 'user not found!'], Response::HTTP_NOT_FOUND);
        }
    }
}
