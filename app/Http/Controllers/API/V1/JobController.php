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

    public function index()
    {
        return $this->jobRepository->index();
    }

    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);

        return $this->jobRepository->update($request, $job);
    }

    public function store(JobRequest $request)
    {
        return $this->jobRepository->store($request);
    }

    /**
     * Get all post
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'GET')]
    public function allPosts()
    {
        return $this->jobRepository->allPosts();
    }

    /**
     * Get home page posts
     */
    #[OpenApi\Operation(tags: ['Job'], method: 'GET')]
    public function homePagePosts()
    {
        return $this->jobRepository->homePagePosts();
    }

    /**
     * Show a specific job
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'GET')]
    public function show($id)
    {
        return $this->jobRepository->show($id);
    }

    /**
     * Delete a job
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'DELETE')]
    public function destroy($id)
    {
        $job = Job::find($id);

        return $this->jobRepository->destroy($job);
    }

    /**
     * Get all jobs for a specific user
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
     */
    #[OpenApi\Operation(tags: ['Jobs'], method: 'PUT')]
    public function toggleJobStatus($id, $status)
    {
        $job = Job::find($id);

        return $this->jobRepository->toggleJobStatus($job, $status);
    }
}
