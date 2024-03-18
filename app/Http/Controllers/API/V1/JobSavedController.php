<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobSavedRequest;
use App\Models\JobSaved;
use App\Models\User;
use App\Repository\API\V1\JobSavedRepository;
use App\Utils\Response;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class JobSavedController extends Controller
{
    use Response;

    private JobSavedRepository $jobSavedRepository;

    public function __construct(JobSavedRepository $jobSavedRepository)
    {
        $this->jobSavedRepository = $jobSavedRepository;
    }

    public function index()
    {

    }

    /**
     * Show saved jobs for a specific user
     * 
     * Get all saved jobs for a specific user
     */
    #[OpenApi\Operation(tags: ['JobSaved'], method: 'GET')]
    public function show($id)
    {
        $user = User::find($id);

        return $this->jobSavedRepository->index($user);
    }

    /**
     * Store a saved job
     * 
     * Save a job to the database
     */
    #[OpenApi\Operation(tags: ['JobSaved'], method: 'POST')]
    public function store(JobSavedRequest $request)
    {
        return $this->jobSavedRepository->store($request);
    }

    /**
     * Delete a saved job
     * 
     * Delete a saved job from the database
     */
    #[OpenApi\Operation(tags: ['JobSaved'], method: 'DELETE')]
    public function destroy($user, $id)
    {
        $jobSavedExists = JobSaved::where('user_id', $user)->where('job_id', $id)->exists();
        if ($jobSavedExists) {
            $jobSaved = JobSaved::where('user_id', $user)->where('job_id', $id)->first();

            return $this->jobSavedRepository->destroy($jobSaved);
        } else {
            return $this->responseError(__('Job not saved'));
        }
    }

    public function update()
    {
        
    }
}
