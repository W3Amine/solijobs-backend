<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Models\CandidateProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\SetAuthCandidateDataRequest;

class CandidateProfileController extends Controller
{




    /**
     * Display a EmployerProfile data using the auth->user
     * Get the current authenticated user EmployerProfile
     * this is authorized only for users with role Employers 3
     */

    public function GetAuthCandidateData(Request $request)
    {
        // get user data
        $user = auth()->user();
        // check if authorize using Gate
        $this->authorize('GetAndSetAuthCandidateData', $user);

        return $request->user()->candidateProfile;
    }



    public function SetAuthCandidateData(SetAuthCandidateDataRequest $request)
    {
        // authorization in the request
        $requestedData = $request->validated();

        $user = auth()->user();
        $user->name = $requestedData['name'];
        $user->email = $requestedData['email'];
        $user->phoneNumber = $requestedData['phoneNumber'];
        $userUpdate = $user->save();



        $candidateProfile = auth()->user()->candidateProfile;
        $candidateProfile->category_id = $requestedData['category_id'];
        $candidateProfile->about = $requestedData['about'];
        $candidateProfile->gender = $requestedData['gender'];
        $candidateProfile->age = $requestedData['age'];
        $candidateProfile->experience = $requestedData['experience'];
        $candidateProfile->qualification = $requestedData['qualification'];
        $candidateProfile->address = $requestedData['address'];
        $candidateProfileUpdate = $candidateProfile->save();

        if ($userUpdate && $candidateProfileUpdate) {
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
    public function show(CandidateProfile $candidateProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CandidateProfile $candidateProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CandidateProfile $candidateProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CandidateProfile $candidateProfile)
    {
        //
    }
}