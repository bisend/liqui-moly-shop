<?php

namespace App\Http\Controllers\User;

use App\DatabaseModels\User;
use App\Http\Controllers\LayoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Class LoginController
 * @package App\Http\Controllers\User
 */
class LoginController extends LayoutController
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);
        
        if ($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'failed' => 'email'
            ]);
        }

        $isActive = User::whereEmail(request('email'))->whereActive(1)->count();

        if (!$isActive)
        {
            return response()->json([
                'status' => 'error',
                'failed' => 'active'
            ]);
        }

        if (!auth()->guard()->attempt([
            'email' => request('email'),
            'password' => request('password'),
            'active' => 1
        ], request('remember')))
        {
            return response()->json([
                'status' => 'error',
                'failed' => 'password'
            ]);
        }
        
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        if (!auth()->check())
        {
            return response()->json([
                'status' => 'success'
            ]);
        }
        else
        {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
