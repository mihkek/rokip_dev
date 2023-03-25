<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmail;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        try {
            $fields = $request->validate([
                'email'    => 'required|string',
                'password' => 'required|string',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'timestamp' => now(),
                'status'    => 'error',
                'message'   => $e->getMessage(),
            ], 404);
        }

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            throw ValidationException::withMessages([
                'message' => ['The provided credentials are incorrect.'],
            ]);
        }

        $authenticate = Auth::attempt(
            $request->only(['email',
                            'password']),
            $request->filled('remember')
        );

        $user->tokens()->delete();

        $token = $user->createToken('user_token')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token,
        ];
        return response($response);
    }

    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string|max:100',
                'email'      => 'required|string|max:100|email|unique:users,email',
                'phone'      => 'required|string|max:25',
                'password'   => 'required|string|min:8|confirmed',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'timestamp' => now(),
                'status'    => 'error',
                'message'   => $e->getMessage(),
            ], 404);
        }

        $user = User::create([
            'name' => $fields['name'],
            'email'      => $fields['email'],
            'phone'      => $fields['phone'],
            'password'   => Hash::make($fields['password']),
        ]);

        Mail::to($user->email)->send(new ConfirmEmail($user));

        $token = $user->createToken('user_token')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token,
        ];
        return response($response);
    }

    public function reset_password(Request $request)
    {
        try {
            $fields = $request->validate([
                'password' => 'required|string|min:8',
                'new_password' => 'required|string|min:8|confirmed',
            ]);
        } catch (\Exception $e){
            return response()->json([
                'timestamp' => now(),
                'status'    => 'error',
                'message'   => $e->getMessage(),
            ], 404);
        }

        $user = auth()->user();

        if (!Hash::check($fields['password'], $user->password)) {
            return response()->json([
                'timestamp' => now(),
                'status'    => 'error',
                'message'   => 'The provided credentials are incorrect.',
            ], 404);
        }
        $user->update([
            'password' => Hash::make($fields['new_password']),
        ]);

        Mail::to($user->email)->send(new ResetPassword($user));

        $response = [
            'message' => 'ok'
        ];
        return response($response);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $response = [
            'message' => 'Logged aut'
        ];
        return response($response);
    }
}
