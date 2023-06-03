<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileImageRequest;

class profileImageController extends Controller
{



    public function upload(ProfileImageRequest $request)
    {



        if ($request->hasFile('ProfileAvatar')) {
            $file = $request->file('ProfileAvatar');

            // Generate a unique name for the file
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Store the file using the Storage facade
            $path = Storage::disk('public')->putFileAs('uploads/images/profileImages', $file, $filename);

            $AuthUserProfileImage = $request->user()->profileImage;
            // check if the user profile is not the default 
            // then check if the file path exist
            //then delete old the file 
            if ($AuthUserProfileImage !== 'uploads/images/profileImages/defaultProfile.jpg' && Storage::disk('public')->exists($AuthUserProfileImage)) {
                Storage::disk('public')->delete($AuthUserProfileImage);
            }

            //update the user ProfileImage in DB
            $request->user()->update(['profileImage' => $path]);

            // Retrieve the public URL for the uploaded file
            $url = Storage::disk('public')->url($path);
            // Perform any additional logic with the file or its URL

            return response()->json(['url' => $url]);
        }

        return "";


    }
}