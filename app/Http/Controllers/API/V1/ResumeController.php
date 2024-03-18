<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResumeRequest;
use App\Models\Resume;
use App\Repository\API\V1\ResumeRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
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
    #[OpenApi\Operation(tags: ['Resume'], method: 'POST')]
    public function store(ResumeRequest $request)
    {
        return $this->resumeRepository->store($request);
    }

    /**
     * Delete user resumes
     * 
     * Delete user resumes from the database
     */
    #[OpenApi\Operation(tags: ['Resume'], method: 'DELETE')]
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
    #[OpenApi\Operation(tags: ['Resume'], method: 'GET')]
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
