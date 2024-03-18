<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Repository\API\V1\PostDurationRepository;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class PostDurationController extends Controller
{
    private PostDurationRepository $postdurationRepository;

    public function __construct(PostDurationRepository $postdurationRepository)
    {
        $this->postdurationRepository = $postdurationRepository;
    }

    /**
     * Get all post durations
     * 
     * Get all post durations from the database
     */
    #[OpenApi\Operation(tags: ['PostDuration'], method: 'GET')]
    public function index()
    {
        return $this->postdurationRepository->index();
    }

    /**
     * Get post duration for partners
     * 
     * Get post duration for partners from the database
     */
    #[OpenApi\Operation(tags: ['PostDuration'], method: 'GET')]
    public function listForPartners($id)
    {
        return $this->postdurationRepository->listForPartners($id);
    }
}
