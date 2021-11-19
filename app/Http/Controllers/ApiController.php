<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken("Login")->accessToken;
            return response()->json([
                'success' => $success
            ], 200);
        }
        else
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

    }
}
