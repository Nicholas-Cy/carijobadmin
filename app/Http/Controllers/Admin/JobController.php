<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Partner;
use App\Repository\API\V1\JobRepository;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private JobRepository $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
     *  Get all jobs
     * 
     *  Get all jobs from the database
     */
    
    public function index()
    {
        return $this->jobRepository->index();
    }

    /**
     * Save a job
     * 
     * Save a job in the database
     */
    
    public function store(JobRequest $request)
    {
        return $this->jobRepository->store($request);
    }

    /**
     * Show the job
     * 
     * Show the job from the database
     */
    
    public function show($id)
    {
        return $this->jobRepository->show($id);
    }

    /**
     * Update the job 
     * 
     * Update the job in the database
     */
    
    public function update(JobRequest $request, $id)
    {
        $job = Job::find($id);

        return $this->jobRepository->update($request, $job);
    }

    /**
     * Delete the job
     * 
     * Delete the job from the database
     */
    
    public function destroy(Job $job)
    {
        return $this->jobRepository->destroy($job);
    }

    /**
     * Get all jobs for a partner
     * 
     * Get all jobs for a partner from the database
     */
    
    public function listJobsPartner(Request $request)
    {
        $partner = Partner::find($request->partner_id);

        return $this->jobRepository->partnerJobs($partner);
    }

    /**
     * Get all jobs for a category
     * 
     * Get all jobs for a category from the database
     */
    
    public function listJobsCategory(Request $request)
    {
        $category = Category::find($request->category_id);

        return $this->jobRepository->categoryJobs($category);
    }

    /**
     * Get all applicants for a job
     * 
     * Get all applicants for a job from the database
     */
    
    public function listJobsApplicants($id)
    {
        return $this->jobRepository->retrieveJobApplicants($id);
    }

    /**
     * Show jobs statistic
     * 
     * Show jobs statistic to the dashboard
     */
    
    public function stats()
    {
        return $this->jobRepository->jobStats();
    }
}
