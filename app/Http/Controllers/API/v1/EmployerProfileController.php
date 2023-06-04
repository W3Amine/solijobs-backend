<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;

use App\Models\EmployerProfile;
use Illuminate\Http\Request;

class EmployerProfileController extends Controller
{


    /**
     * Display a EmployerProfile data using the auth->user
     * Get the current authenticated user EmployerProfile
     * this is authorized only for users with role Employers 3
     */

    public function GetAuthEmployerData(Request $request)
    {
        return $request->user()->employerProfile;
    }



    public function SetAuthEmployerData(Request $request)
    {
        return $request->user()->employerProfile;
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