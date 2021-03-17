<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function create(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $user_exists = User::where('email', $email)->exists();

        if ($user_exists) {
            $user = User::where('email', $email)->first();
            // dd($user);

            if (Hash::check($password, $user->password)) {
                $token = $user->createToken($password);

                return ['token' => $token->plainTextToken];
            } else {
                return ['message' => 'Incorrect credentials.'];
            }
        } else {
            return ['message' => 'Incorrect credentials.'];
        }
    }

    public function revoke(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return ['message' => 'Your token was revoked.'];
    }

    public function unauthorized(Request $request) {
        return ['message' => 'Unauthorized access.'];
    }
}
