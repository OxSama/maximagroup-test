<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Announcement;
use App\Events\NewAnnouncement;

class AuthController extends Controller
{
    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create a personal access token for the registered user.
        $tokenResult = $this->createNewToken($user);
        $token = $tokenResult->plainTextToken;

        $announcement = Announcement::create(['message' => 'A new user was added']);
        // event(new NewAnnouncement($announcement));
        broadcast(new NewAnnouncement($announcement));
        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user,
            'token' => $token
        ], 201);
    }


    /**
     * Login user and return a token
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = $request->user();


        $tokenResult = $this->createNewToken($user);

        // Depending on the version of Passport you're using:
        $token = $tokenResult->plainTextToken;

        $response = [
            'token' => $token,
            'expires_at' => Carbon::parse($tokenResult->accessToken->expires_at)->toDateTimeString()
        ];

        return response()->json($response, 200);
    }

    private function createNewToken($user)
    {
        // Define abilities based on user role.
        switch ($user->role_id) {
            case 1:
                $abilities = ['*'];  // Admin can do anything
                break;

            default:
                $abilities = ['view-posts', 'create-posts', 'edit-posts'];  // Example abilities
                break;
        }

        // Create the token with assigned abilities and set an expiration time.
        $tokenResult = $user->createToken('Personal Access Token', $abilities);
        $tokenResult->accessToken->expires_at = Carbon::now()->addWeeks(1);
        $tokenResult->accessToken->save();

        return $tokenResult;
    }

    /**
     * Logout the authenticated user
     */
    public function logout(Request $request)
    {
        // Revoke the user's token
        $request->user()->token()->revoke();

        return response()->json(['message' => 'User logged out successfully'], 200);
    }
}
