<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('MyApp')->accessToken;

        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    if (auth('web')->attempt($credentials)
    ) {
        $token = auth('web')->user()->createToken('MyApp')->accessToken;
        return response()->json(['token' => $token], 200);
    } else {
        return response()->json(['error' => 'UnAuthorised'], 401);
    }
}


    public function logout()
    {
        auth()->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
