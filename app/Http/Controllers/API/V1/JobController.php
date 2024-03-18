<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\User;
use App\Repository\API\V1\JobRepository;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class JobController extends Controller
{
    private JobRepository $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
     * Get all jobs
     * 
     * Get all jobs from the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'GET')]
    public function index()
    {
        return $this->jobRepository->index();
    }

    /**
     * Update a job
     * 
     * Update a job in the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'PUT')]
    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);

        return $this->jobRepository->update($request, $job);
    }

    /**
     * Save a job
     * 
     * Save a job to the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'POST')]
    public function store(JobRequest $request)
    {
        return $this->jobRepository->store($request);
    }

    /**
     * Get all job posted
     * 
     * Get all posted jobs from the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'GET')]
    public function allPosts()
    {
        return $this->jobRepository->allPosts();
    }

    /**
     * Get home page posts
     * 
     * Get all home page posts from the database
     */
    #[OpenApi\Operation(tags: ['Job'], method: 'GET')]
    public function homePagePosts()
    {
        return $this->jobRepository->homePagePosts();
    }

    /**
     * Show a specific job
     * 
     * Get a specific job from the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'GET')]
    public function show($id)
    {
        return $this->jobRepository->show($id);
    }

    /**
     * Delete a job
     * 
     * Delete a job from the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'DELETE')]
    public function destroy($id)
    {
        $job = Job::find($id);

        return $this->jobRepository->destroy($job);
    }

    /**
     * Get all jobs for a specific user
     * 
     * Get all jobs for a specific user from the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'GET')]
    public function jobUser(Request $request)
    {
        $job_id = $request->job_id;
        $user = User::find($request->user_id);

        return $this->jobRepository->retrieveJobUser($job_id, $user);
    }

    /**
     * Toggle the status of the job
     * 
     * Toggle the status of the job in the database
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'PUT')]
    public function toggleJobStatus($id, $status)
    {
        $job = Job::find($id);

        return $this->jobRepository->toggleJobStatus($job, $status);
    }
}
