<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'boolean',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Invalid credentials.'
            ], 422);
        }
    
        if (!$user->isAdmin()) {
            return response([
                'message' => 'You do not have permission to authenticate as an admin.'
            ], 403);
        }
    
        Auth::login($user, $request->remember);
        $token = $user->createToken('main')->plainTextToken;
    
        return response([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }
    

    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response('', 204);
    }
    public function getUser(Request $request)
    {
        return new UserResource($request->user());
    }
}