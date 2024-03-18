<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostDurationRequest;
use App\Models\PostDuration;
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
     * Save post duration
     * 
     * Save post duration to the database
     */
    #[OpenApi\Operation(tags: ['PostDuration'], method: 'POST')]
    public function store(PostDurationRequest $request)
    {
        return $this->postdurationRepository->store($request);
    }

    /**
     * Update post duration
     * 
     * Update post duration in the database
     */
    #[OpenApi\Operation(tags: ['PostDuration'], method: 'PUT')]
    public function update(PostDurationRequest $request, $id)
    {
        $postduration = PostDuration::find($id);

        return $this->postdurationRepository->update($request, $postduration);
    }

    /**
     * Delete post duration
     * 
     * Delete post duration from the database
     */
    #[OpenApi\Operation(tags: ['PostDuration'], method: 'DELETE')]
    public function destroy($id)
    {
        $postduration = PostDuration::find($id);

        return $this->postdurationRepository->destroy($postduration);
    }

    /**
     * Show post duration
     * 
     * Show post duration to the dashboard
     */
    #[OpenApi\Operation(tags: ['PostDuration'], method: 'GET')]
    public function show()
    {
        
    }
}
