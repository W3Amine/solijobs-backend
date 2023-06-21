<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\jobRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SingleJobResource;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }






    public function GetJobDetails(Request $request, $id)
    {

        $jobDetails = DB::table('jobs')
            ->join('employer_profiles', 'jobs.employer_id', '=', 'employer_profiles.id')
            ->join('users', 'employer_profiles.user_id', '=', 'users.id')
            ->select('jobs.*', 'employer_profiles.*', 'users.name', 'users.email', 'users.phoneNumber', 'users.profileImage')
            ->where('jobs.id', $id)->get();

        if (count($jobDetails) > 0) {
            $jobDetails[0]->profileImage = Storage::disk('public')->url($jobDetails[0]->profileImage);
            return $jobDetails;
        } else {
            abort(404);
        }


    }


    /**
     * Display the Employer Jobs.
     */
    public function GetEmployerJobs(Request $request)
    {

        // if (!$userId) {
        //     $userId = auth()->user()->id;
        // }

        // $EmployerJobs = Job::where('id', User::FindOrFail($userId)->employerProfile->id)->orderBy('created_at')->get();



        // $jobs = Job::where('employer_id', $request->user()->employerProfile->id)->with('employer.user')->get();

        $jobs = DB::table('jobs')
            ->join('employer_profiles', 'jobs.employer_id', '=', 'employer_profiles.id')
            ->join('users', 'employer_profiles.user_id', '=', 'users.id')
            ->select('jobs.*', 'employer_profiles.website', 'users.profileImage')
            ->where('employer_profiles.id', $request->user()->employerProfile->id);


        if (isset($request->type)) {
            $jobs->where('type', $request->type);
        }

        $data = $jobs->orderBy('created_at', 'desc')->paginate($request->show);
        return SingleJobResource::collection($data);


        // $EmployerJobs = $request->user()->employerProfile->jobs();
        // if (isset($request->type)) {
        //     $EmployerJobs->where('type', $request->type);
        // }

        // $EmployerJobsdata = $EmployerJobs->orderBy('created_at', 'desc')->paginate($request->show);

        // return $EmployerJobsdata;
        // problem is even if y add a gate to only accept admin and employer
        // some employers will send other id to the api and get all the jobs active and passive
        // of the user
        // gate if is admin or isEmployer 
        // solution (isadmin) || (isEmployer And $userId === auth()->user()->id )  

    }




    public function GetUnactiveJobs(Request $request)
    {

        $jobs = DB::table('jobs')
            ->join('employer_profiles', 'jobs.employer_id', '=', 'employer_profiles.id')
            ->join('users', 'employer_profiles.user_id', '=', 'users.id')
            ->select('jobs.*', 'employer_profiles.website', 'users.profileImage')
            ->where('jobs.is_active', false);


        if (isset($request->type)) {
            $jobs->where('type', $request->type);
        }

        $data = $jobs->orderBy('created_at', 'desc')->paginate($request->show);
        return SingleJobResource::collection($data);


    }



    public function GetActiveJobs(Request $request)
    {

        $jobs = DB::table('jobs')
            ->join('employer_profiles', 'jobs.employer_id', '=', 'employer_profiles.id')
            ->join('users', 'employer_profiles.user_id', '=', 'users.id')
            ->select('jobs.*', 'employer_profiles.website', 'users.profileImage')
            ->where('jobs.is_active', true);


        if (isset($request->type)) {
            $jobs->where('type', $request->type);
        }

        if (isset($request->category)) {
            $jobs->where('jobs.category_id', $request->category);
        }

        if (isset($request->search)) {
            $jobs->where('jobs.title', 'like', "%" . $request->search . "%");
        }


        if (isset($request->country)) {
            $jobs->where('jobs.country', 'like', "%" . $request->country . "%");
        }


        $data = $jobs->orderBy('created_at', 'desc')->paginate($request->show);
        return SingleJobResource::collection($data);


    }


    public function GetAppliedJobs(Request $request)
    {



        $appliedJobs = DB::table('jobs_applications')
            ->join('jobs', 'jobs_applications.job_id', '=', 'jobs.id')
            ->join('employer_profiles', 'jobs.employer_id', '=', 'employer_profiles.id')
            ->join('candidate_profiles', 'jobs_applications.candidate_profile_id', '=', 'candidate_profiles.id')
            ->join('users', 'employer_profiles.user_id', '=', 'users.id')
            ->select('jobs.*', 'candidate_profiles.id as candidate_id', 'users.profileImage', 'employer_profiles.website')
            ->where('candidate_profiles.id', $request->user()->CandidateProfile->id);




        if (isset($request->type)) {
            $appliedJobs->where('type', $request->type);
        }

        $appliedJobsData = $appliedJobs->orderBy('created_at', 'desc')->paginate($request->show);
        return SingleJobResource::collection($appliedJobsData);


    }


    public function GetSavedJobs(Request $request)
    {

        $SavedJobs = DB::table('saved_jobs')
            ->join('jobs', 'saved_jobs.job_id', '=', 'jobs.id')
            ->join('employer_profiles', 'jobs.employer_id', '=', 'employer_profiles.id')
            ->join('candidate_profiles', 'saved_jobs.candidate_profile_id', '=', 'candidate_profiles.id')
            ->join('users', 'employer_profiles.user_id', '=', 'users.id')
            ->select('jobs.*', 'candidate_profiles.id as candidate_id', 'users.profileImage', 'employer_profiles.website')
            ->where('candidate_profiles.id', $request->user()->CandidateProfile->id);




        if (isset($request->type)) {
            $SavedJobs->where('type', $request->type);
        }

        $SavedJobsData = $SavedJobs->orderBy('created_at', 'desc')->paginate($request->show);
        return SingleJobResource::collection($SavedJobsData);

    }





    public function GetJobApplyers($jobId)
    {
        // $applyers = Job::with(['applicants_candidates.user', 'user'])->where('id', $jobId)->get();

        $applyers = Job::select('candidate_profiles.id', 'candidate_profiles.user_id', 'candidate_profiles.experience', 'candidate_profiles.age', 'users.name', 'users.profileImage')
            ->join('jobs_applications', 'jobs.id', '=', 'jobs_applications.job_id')
            ->join('candidate_profiles', 'jobs_applications.candidate_profile_id', '=', 'candidate_profiles.id')
            ->join('users', 'candidate_profiles.user_id', '=', 'users.id')
            ->where('jobs.id', $jobId)
            ->get();
        return $applyers;
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
    public function store(jobRequest $request)
    {
        $validatedData = $request->validated();

        auth()->user()->employerProfile->jobs()->create($request->validated());


        return "The Job Created Successfully Successfully 🥳";



    }





    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }



    ####################################################################
#################### ACTIONS ########################################
####################################################################

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //dd("fff");
        return $job->delete();
    }





    public function saveJob(Request $request)
    {
        //dd("fff");
        return auth()->user()->candidateProfile->saved_jobs()->attach($request->job_id);

    }



    public function applyjob(Request $request)
    {
        //dd("fff");
        return auth()->user()->candidateProfile->applied_jobs()->attach($request->job_id);
        ;
    }


    public function Activatejob(Request $request)
    {
        //dd("fff");
        // return auth()->user()->candidateProfile->applied_jobs()->attach($request->job_id);

        $job = Job::FindOrFail($request->job_id);
        $job->is_active = true;
        $job->save();

    }



####################################################################
#################### ACTIONS ########################################
####################################################################

}