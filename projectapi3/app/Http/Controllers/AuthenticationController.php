<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|string",
            "password" => "required|string",
        ]);
        $admin = Admin::firstWhere("email", $request->email);
        // dd($admin);

        if (!$admin || Hash::check($request->password, $admin->password)) {
            return response()->json([
                "message" => "Bad Credential!"
            ], Response::HTTP_NOT_FOUND);
        }

        $token = $admin->createToken("sanctum_token")->plainTextToken;

        return response()->json([
            "message" => "Successfully Logged In",
            "token" => $token,
        ], Response::HTTP_OK);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "Successfully Logged Out"
        ], Response::HTTP_OK);
    }

    public function getUser()
    {
        return response()->json([
            "user" => auth()->user()
        ], Response::HTTP_OK);
    }
}
