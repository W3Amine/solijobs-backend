<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserRegister extends Controller
{

    public function register(RegisterRequest $request)
    {
        //get validated Data
        $data = $request->validated();
        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
        // create the token
        $token = $user->createToken('main')->plainTextToken;
        //return user data and the token
        return response(compact('token'));
    }
}