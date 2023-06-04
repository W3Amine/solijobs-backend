<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;

class ChangePasswordController extends Controller
{
    public function index(ChangePasswordRequest $request)
    {
        $requestData = $request->validated();

        if (Hash::check($requestData["password"], $request->user()->password)) {
            // Passwords match
            // update the password with new password hashed value
            $update = $request->user()->update([
                'password' => Hash::make($requestData['new_password']),
            ]);
            if ($update) {
                // if the update is true then response with success message
                return "The password changed Successfully 🥳";
            }
        } else {
            // Provided password is incorret
            return response([
                'errors' => ['error' => ['Provided password is incorrect']]
            ], 422);
        }
    }
}