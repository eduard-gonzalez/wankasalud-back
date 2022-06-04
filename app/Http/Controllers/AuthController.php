<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;

use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()) return response()->json(['message' => 'error en los campos', 'status' => false], 400);

        $user = User::where('email', $request->email)->where('status', 1)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'error, credentials do not match.',
                'status' => false
            ]);
        }

        $token = $user->createToken($user->name)->plainTextToken;

        // return redirect('/home');
        return response()->json(['user' => $user->name, 'token' => $token, 'status' => true]);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'You have successfully logged out.',
            'status' => true
        ], 200);
    }

}
