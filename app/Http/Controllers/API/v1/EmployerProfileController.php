<?php

namespace App\Http\Controllers\API\v1;


use Illuminate\Http\Request;
use App\Models\EmployerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\SetAuthEmployerDataRequest;

class EmployerProfileController extends Controller
{

    /**
     * Display a EmployerProfile data using the auth->user
     * Get the current authenticated user EmployerProfile
     * this is authorized only for users with role Employers 3
     */

    public function GetAuthEmployerData(Request $request)
    {
        // get user data
        $user = auth()->user();
        // check if authorize using Gate
        $this->authorize('GetAndSetAuthEmployerData', $user);

        return $request->user()->employerProfile;
    }



    public function SetAuthEmployerData(SetAuthEmployerDataRequest $request)
    {
        // authorization in the request
        $requestedData = $request->validated();

        $user = auth()->user();
        $user->name = $requestedData['name'];
        $user->email = $requestedData['email'];
        $user->phoneNumber = $requestedData['phoneNumber'];
        $userUpdate = $user->save();



        $employerProfile = auth()->user()->employerProfile;
        $employerProfile->website = $requestedData['website'];
        $employerProfile->about = $requestedData['about'];
        $employerProfile->facebook = $requestedData['facebook'];
        $employerProfile->twitter = $requestedData['twitter'];
        $employerProfileUpdate = $employerProfile->save();

        if ($userUpdate && $employerProfileUpdate) {
            // return 'Profile Updated Successfully 🤗';
            return ['user' => $user, 'success' => 'Profile Updated Successfully 🤗'];
        }


    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployerProfile $employerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployerProfile $employerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployerProfile $employerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployerProfile $employerProfile)
    {
        //
    }
}