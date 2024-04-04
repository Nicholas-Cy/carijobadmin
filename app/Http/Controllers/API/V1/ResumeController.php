<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResumeRequest;
use App\Models\Resume;
use App\Repository\API\V1\ResumeRepository;

class ResumeController extends Controller
{
    private ResumeRepository $resumeRepository;

    public function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
    }

    /**
     * Save user resumes
     * 
     * Save user resumes to the database
     */
    
    public function store(ResumeRequest $request)
    {
        return $this->resumeRepository->store($request);
    }

    /**
     * Delete user resumes
     * 
     * Delete user resumes from the database
     */
    
    public function destroy($id)
    {
        $resume = Resume::find($id);

        return $this->resumeRepository->destroy($resume);
    }

    /**
     * Get a user resume
     * 
     * Get a user resume from the database
     */
        public function userResumes($id)
    {
        return $this->resumeRepository->userResumes($id);
    }

    public function index() 
    {

    }

    public function show() 
    {

    }

    public function update()
    {
        
    }
}
