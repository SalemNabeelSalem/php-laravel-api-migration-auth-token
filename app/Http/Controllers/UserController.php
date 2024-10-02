<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

use App\Models\User;

// php artisan make:controller UserController

class UserController extends Controller
{
    public function register(Request $request)
    {
        $requestedName = $request->input('name');
        $requestedEmail = $request->input('email');
        $emailVerifiedAt = now();
        $requestedPassword = $request->input('password');

        $user = User::create([
            'name' => $requestedName,
            'email' => $requestedEmail,
            'email_verified_at' => $emailVerifiedAt,
            'password' => Hash::make($requestedPassword),
        ]);

        return response()->json(['user' => $user]);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        } else {
            $requestedPassword = $request->input('password');

            if (Hash::check($requestedPassword, $user->password)) {
                // return response()->json(['user' => $user], 200);

                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['message' => 'Incorrect password'], 401);
            }
        }
    }
}
