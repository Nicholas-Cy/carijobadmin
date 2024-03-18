<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use App\Repository\API\V1\JobApplicationRepository;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class JobApplicationController extends Controller
{
    private JobApplicationRepository $jobApplicationRepository;

    public function __construct(JobApplicationRepository $jobApplicationRepository)
    {
        $this->jobApplicationRepository = $jobApplicationRepository;
    }

    /**
     * List all job applications for a specific job
     * 
     * List all job applications for a specific job from the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'GET')]
    public function index(Request $request)
    {
        $job = Job::find($request->job_id);

        return $this->jobApplicationRepository->index($job);
    }

    
    /**
     * Store a new job application
     * 
     * Store a new job application to the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'POST')]
    public function store(JobApplicationRequest $request)
    {
        return $this->jobApplicationRepository->store($request);
    }

    

    /**
     * Delete a job application
     * 
     * Delete a job application from the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'DELETE')]
    public function destroy(JobApplication $jobApplication)
    {
        return $this->jobApplicationRepository->destroy($jobApplication);
    }

    
    /**
     * Shortlist an applicant
     * 
     * Shortlist an applicant for a job
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'GET')]
    public function shortlistApplicant(Request $request)
    {
        $jobApplication = JobApplication::find($request->id);

        return $this->jobApplicationRepository->shortlistApplicant($jobApplication);
    }

    
    /**
     * List all job applications for a specific user
     * 
     * List all job applications for a specific user from the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'GET')]
    public function listApplications(Request $request)
    {
        $user = User::find($request->user_id);

        return $this->jobApplicationRepository->listJobApplicationUser($user);
    }

    
    /**
     * List shortlisted jobs for a specific user
     * 
     * List all shortlisted jobs for a specific user from the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'GET')]
    public function listShortlistedJobs(Request $request)
    {
        $user = User::find($request->user_id);

        return $this->jobApplicationRepository->listShortlistedJobsUser($user);
    }

    /**
     * Count shortlisted jobs for a specific user
     * 
     * Count all shortlisted jobs for a specific user from the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'GET')]
    public function shortlistedCount(Request $request)
    {
        $user = User::find($request->user_id);

        return $this->jobApplicationRepository->countUserShortlistedJobs($user);
    }

    /**
     * Toggle the read status of a job application
     * 
     * Toggle the read status of a job application in the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'PUT')]
    public function toggleReadStatus($id)
    {
        $jobApplication = JobApplication::find($id);

        return $this->jobApplicationRepository->toggleReadStatus($jobApplication);
    }

    /**
     * Show the specified job application
     * 
     * Show the specified job application from the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'GET')]
    public function show()
    {

    }

    /**
     * Update the job application
     * 
     * Update the job application in the database
     */
    #[OpenApi\Operation(tags: ['JobApplication'], method: 'PUT')]
    public function update()
    {

    }

}
