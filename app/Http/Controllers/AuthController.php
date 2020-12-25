<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function getToken($id)
    {
        $user = User::findOrFail($id);
        return JWTAuth::fromUser($user);
    }
}
