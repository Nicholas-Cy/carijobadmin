<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repository\API\V1\JobTypeRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class JobTypeController extends Controller
{
    private JobTypeRepository $jobtypeRepository;

    public function __construct(JobTypeRepository $jobtypeRepository)
    {
        $this->jobtypeRepository = $jobtypeRepository;
    }

    /**
     * Get all job types
     */
    #[OpenApi\Operation(tags: ['JobType'], method: 'GET')]
    public function index()
    {
        return $this->jobtypeRepository->index();
    }
}
