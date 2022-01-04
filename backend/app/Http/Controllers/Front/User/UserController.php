<?php

namespace App\Http\Controllers\Front\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Package\Adapter\Converter\User\UserLoginRequestConverter;
use Package\Adapter\Converter\User\UserCreateRequestConverter;
use Package\Application\User\Login\UserLoginUsecase;
use Package\Application\User\Create\UserCreateUsecase;
use Package\Adapter\Presenter\User\UserLoginPresenter;
use Package\Adapter\Presenter\User\UserCreateJsonPresenter;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'create']]);
    }

    public function create(UserCreateRequestConverter $input, UserCreateUsecase $usecase, UserCreateJsonPresenter $presenter)
    {
        $output = $usecase->exec($input);
        return $presenter->exec($output);
    }

    public function login(UserLoginRequestConverter $input, UserLoginUsecase $usecase, UserLoginPresenter $presenter)
    {
        $output = $usecase->exec($input);
        return $presenter->exec($output);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}