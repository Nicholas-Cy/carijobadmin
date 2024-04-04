<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobTypeRequest;
use App\Models\JobType;
use App\Repository\API\V1\JobTypeRepository;

class JobTypeController extends Controller
{
    private JobTypeRepository $jobtypeRepository;

    public function __construct(JobTypeRepository $jobtypeRepository)
    {
        $this->jobtypeRepository = $jobtypeRepository;
    }

    /**
     * Get all job types
     * 
     * Get all job types from the database
     */
    
    public function index()
    {
        return $this->jobtypeRepository->index();
    }

    /**
     * Save a job type
     * 
     * Save a job type to the database
     */
    
    public function store(JobTypeRequest $request)
    {
        return $this->jobtypeRepository->store($request);
    }

    /**
     * Update a job type
     * 
     * Update a job type in the database
     */
    
    public function update(JobTypeRequest $request, $id)
    {
        $jobtype = JobType::find($id);

        return $this->jobtypeRepository->update($request, $jobtype);
    }

    /**
     * Delete a job type
     * 
     * Delete a job type from the database
     */
    
    public function destroy(JobType $jobType)
    {
        return $this->jobtypeRepository->destroy($jobType);
    }

    public function show()
    {

    }
}
